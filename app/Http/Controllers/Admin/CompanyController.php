<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{

    protected $folder = 'web/img/company';
    protected $width = 120;
    protected $height = 60;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $companies = Company::all();
        //dd($companies);
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $company = new Company();
        return view('admin.company.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCompanyRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['width'] = $data['width'] ?? $this->width;
        $data['height'] = $data['height'] ?? $this->height;

        //Check if status is being set to 'Active: 1'
        if ((int)$data['status'] == 1) {
            // Set all other companies to 'Inactive: 0'
            Company::where('status', 1)->update(['status' => 0]);
        }

        if(File::isFile($request->image)) {
            $data['image'] = $this->uploadImage($request->file('image'), $this->folder, $data['width'], $data['height']);
        }
        if(File::isFile($request->favicon)) {
            $data['favicon'] = $this->uploadImage($request->file('favicon'), $this->folder, 48, 48);
        }

        Company::create($data);

        return redirect()->route('company.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return int
     */
    public function show(Company $company)
    {
        //
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $data = $request->validated();

        $data['width'] = $data['width'] ?? $this->width;
        $data['height'] = $data['height'] ?? $this->height;

        // Check if it's the only active one
        if ((int)$data['status'] == 0) {
            $activeCompaniesCount = Company::where('status', 1)->count();

            // Prevent deactivating the last active company
            if ($company->status == 1 && $activeCompaniesCount <= 1) {
                return redirect()->back()->with('danger', 'At least one company must remain active.');
            }
        }

        // Check if status is being updated to 'Active: 1'
        if ((int)$data['status'] == 1) {
            // Set all other companies to 'Inactive: 0'
            Company::where('status', 1)->where('id', '!=', $company->id)->update(['status' => 0]);
        }

        if(File::isFile($request->image)) {
            $this->deleteImage($company->id, $this->folder, Company::class);
            $data['image'] = $this->uploadImage($request->file('image'), $this->folder, $data['width'], $data['height']);
        }

        if(File::isFile($request->favicon)) {
            //$this->deleteImage($company->id, $this->folder, Company::class);
            $data['favicon'] = $this->uploadImage($request->file('favicon'), $this->folder, 48, 48);
        }

        $company->update($data);

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        // Inactive row delete
        if($company->status == 0) {
            $this->deleteImage($company->id, 'company', Company::class);
            $company = Company::findOrFail($company->id);
            $company->delete();
            return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
        }
        return redirect()->route('company.index')->with('danger', 'Cannot delete an active company.');
    }

}
