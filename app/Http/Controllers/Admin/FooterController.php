<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Http\Requests\StoreFooterRequest;
use App\Http\Requests\UpdateFooterRequest;
use App\Traits\FooterTemplate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class FooterController extends Controller
{
    use FooterTemplate;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.footer.index', [
            'templates' => Footer::orderBy('order')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $template = new Footer();
        
        return view('admin.footer.create', compact('template'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFooterRequest $request
     * @return RedirectResponse
     */
    public function store(StoreFooterRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->createTemplate($data);

        return redirect()->route('admin.footer.index')->with('success', 'Footer Template Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Footer $footer
     * @return Response
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Footer $footer
     * @return Application|Factory|View
     */
    public function edit(Footer $footer)
    {

        $filePath = resource_path("views/admin/footer/templates/{$footer->file_name}.blade.php");

        return view('admin.footer.edit', [
            'template' => $footer,
            'content' => File::exists($filePath) ? file_get_contents($filePath) : ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFooterRequest $request
     * @param Footer $footer
     * @return RedirectResponse
     */
    public function update(UpdateFooterRequest $request, Footer $footer): RedirectResponse
    {
        $data = $request->validated();
        $this->updateTemplate($footer, $data);

        return redirect()->route('admin.footer.index')->with('success', 'Footer Template Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Footer $footer
     * @return RedirectResponse
     */
    public function destroy(Footer $footer): RedirectResponse
    {
        $this->deleteTemplate($footer);
        return redirect()->route('admin.footer.index')->with('success', 'Footer Template Deleted');
    }

    public function activate($id): RedirectResponse
    {
        $this->activateTemplate($id);
        return redirect()->back()->with('success', 'Footer template activated successfully!');
    }
}
