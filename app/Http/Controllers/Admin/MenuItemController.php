<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Menu;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $menuItems = MenuItem::with('parent')->orderBy('order')->get();
        return view('admin.menu-items.index', compact('menuItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $menus = Menu::all()->where('status', 1);
        $pages = Page::all()->where('status', 1);
        $menuItem = new MenuItem();
        $parents = MenuItem::whereNull('parent_id')->get(); // Top-level items
        return view('admin.menu-items.create', compact('menus', 'pages','menuItem', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMenuItemRequest $request
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function store(StoreMenuItemRequest $request, Menu $menu): RedirectResponse
    {
        $data = $request->validated();
        $data['url'] = Str::slug($data['url']);

        MenuItem::create($data);

        return redirect()->route('menu-items.index')->with('success', 'Menu item created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param MenuItem $menuItem
     * @return Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MenuItem $menuItem
     * @return Application|Factory|View
     */
    public function edit(MenuItem $menuItem)
    {
        $menus = Menu::all()->where('status', 1);
        $pages = Page::all()->where('status', 1);
        $menuItems = MenuItem::whereNull('parent_id')->where('id', '=', $menuItem->id)->get();
        $parents = MenuItem::whereNull('parent_id')->where('id', '!=', $menuItem->id)->get(); // Exclude itself
        return view('admin.menu-items.edit',
            compact(
                'menuItem',
                'menus',
                'pages',
                'menuItems',
                'parents'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMenuItemRequest $request
     * @param MenuItem $menuItem
     * @return RedirectResponse
     */
    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem): RedirectResponse
    {
        $data = $request->validated();
        $data['url'] = Str::slug($data['url']);

        $menuItem->update($data);

        return redirect()->route('menu-items.index')->with('success', 'Menu item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MenuItem $menuItem
     * @return RedirectResponse
     */
    public function destroy(MenuItem $menuItem): RedirectResponse
    {
        // Inactive row delete
        if($menuItem->status == 0) {
            $menuItem = MenuItem::findOrFail($menuItem->id);
            $menuItem->delete();
            return redirect()->route('menu-items.index')->with('success', 'Menu item deleted successfully.');
        }
        return redirect()->route('menu-items.index')->with('danger', 'Cannot delete an active menu item.');
    }
}
