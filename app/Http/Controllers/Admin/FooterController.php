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
        return view('admin.footer.create');
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
        return view('admin.footer.edit', [
            'template' => $footer,
            'content' => file_get_contents(resource_path("views/admin/footer/templates/{$footer->file_name}.blade.php"))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFooterRequest  $request
     * @param Footer $footer
     * @return Response
     */
    public function update(UpdateFooterRequest $request, Footer $footer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Footer $footer
     * @return Response
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
