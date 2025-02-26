<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Http\Requests\StoreHeroRequest;
use App\Http\Requests\UpdateHeroRequest;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{
    protected $folder = 'web/img/hero';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        // Fetch all heroes with their associated pages
        $heroes = Hero::with('page')->get();

        // Get all the unique page_ids from the heroes
        $pageIds = $heroes->pluck('page_id')->unique();

        // Fetch the page titles based on the unique page_ids
        $pageNames = Page::whereIn('id', $pageIds)->pluck('title', 'id');

        // Return the view with heroes and the page names mapped by page_id
        return view('admin.hero.index', compact('heroes', 'pageNames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $pages = Page::select('id','title')->where('status', 1)->get();
        $hero = new Hero();
        return view('admin.hero.create', compact('hero', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreHeroRequest $request
     * @return RedirectResponse
     */
    public function store(StoreHeroRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if(File::isFile($request->image)) {
            $data['image'] = $this->uploadImage($request->file('image'), $this->folder, 1920, 1080);
        }

        Hero::create($data);

        return redirect()->route('hero.index')->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Hero $hero
     * @return Response
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Hero $hero
     * @return Application|Factory|View
     */
    public function edit(Hero $hero)
    {
        $pages = Page::select('id','title')->where('status', 1)->get();
        return view('admin.hero.edit', compact('hero', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateHeroRequest $request
     * @param Hero $hero
     * @return RedirectResponse
     */
    public function update(UpdateHeroRequest $request, Hero $hero): RedirectResponse
    {
        $data = $request->validated();

        if(File::isFile($request->image)) {
            $this->deleteImage($hero->id, $this->folder, Hero::class);
            $data['image'] = $this->uploadImage($request->file('image'), $this->folder, 1920, 1080);
        }

        $hero->update($data);

        return redirect()->route('hero.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Hero $hero
     * @return RedirectResponse
     */
    public function destroy(Hero $hero): RedirectResponse
    {
        // Inactive row delete
        if($hero->status == 0) {
            $this->deleteImage($hero->id, 'hero', Hero::class);
            $hero = Hero::findOrFail($hero->id);
            $hero->delete();
            return redirect()->route('hero.index')->with('success', 'Deleted successfully.');
        }
        return redirect()->route('hero.index')->with('danger', 'Cannot delete an active data.');
    }
}
