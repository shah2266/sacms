<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $page = new Page();
        $templates = $this->getPageTemplate();
        return view('admin.page.create', compact('page', 'templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePageRequest $request
     * @return RedirectResponse
     */
    public function store(StorePageRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['slug'] ?? $data['title']);

        Page::create($data);

        return redirect()->route('page.index')->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Application|Factory|View
     */
    public function edit(Page $page)
    {
        $templates = $this->getPageTemplate();
        return view('admin.page.edit', compact('page', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePageRequest $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['slug'] ?? $data['title']);

        $page->update($data);

        return redirect()->route('page.index')->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return RedirectResponse
     */
    public function destroy(Page $page): RedirectResponse
    {
        // Inactive row delete
        if($page->status == 0) {
            $page = Page::findOrFail($page->id);
            $page->delete();
            return redirect()->route('page.index')->with('success', 'Page deleted successfully.');
        }
        return redirect()->route('page.index')->with('danger', 'Cannot delete an active page.');
    }


    public function getPageTemplate(): array
    {
        $getPageTemplates = File::glob(resource_path('views/template/*.blade.php'));
        $ignoredFiles = [];
        $filteredTemplates = [];
        foreach ($getPageTemplates as $pageTemplate) {
            $template = str_replace('.blade', '', pathinfo($pageTemplate, PATHINFO_FILENAME));

            //Check if the file should be ignored

            if(in_array($template, $ignoredFiles)) {
                continue;
            }

            $filteredTemplates[] = ucfirst($template);
        }


        return $filteredTemplates;
    }


    public function createBladeTemplate(): string
    {
        // Define the path to the Blade template file
        $bladeFilePath = resource_path('views/dynamic_template.blade.php');

        // Blade template content
        $bladeContent = <<<'BLADE'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Blade Template</title>
</head>
<body>
    <h1>Welcome to {{ $pageTitle }}</h1>

    @if ($showContent)
        <p>This is a dynamically created Blade template!</p>
    @else
        <p>No content to display.</p>
    @endif

    <ul>
        @foreach ($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</body>
</html>
BLADE;

        // Create the Blade template file
        File::put($bladeFilePath, $bladeContent);

        return "Blade template created successfully!";
    }
}
