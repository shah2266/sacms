<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ColorSetting;
use App\Http\Requests\StoreColorSettingRequest;
use App\Http\Requests\UpdateColorSettingRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ColorSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $colors = ColorSetting::all();
        return view('admin.color-settings.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreColorSettingRequest $request
     * @return JsonResponse
     */
    public function store(StoreColorSettingRequest $request): JsonResponse
    {
        $data = $request->validated();

        $color = ColorSetting::create($data);
        $this->updateCssFile();

        return response()->json(['success' => 'Color added successfully.', 'color' => $color]);
    }

    /**
     * Display the specified resource.
     *
     * @param ColorSetting $color
     * @return Response
     */
    public function show(ColorSetting $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ColorSetting $color
     * @return Response
     */
    public function edit(ColorSetting $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateColorSettingRequest $request
     * @param ColorSetting $color
     * @return JsonResponse
     */
    public function update(UpdateColorSettingRequest $request, ColorSetting $color): JsonResponse
    {
        $data = $request->validated();

        $color->update($data);
        $this->updateCssFile();

        return response()->json(['success' => 'Color updated successfully.', 'color' => $color]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ColorSetting $color
     * @return JsonResponse
     */
    public function destroy(ColorSetting $color): JsonResponse
    {
        $color->delete();
        $this->updateCssFile();

        return response()->json(['success' => 'Color deleted successfully.']);
    }

    /**
     * Regenerate the CSS file with updated colors.
     */
    protected function updateCssFile()
    {
        $colors = ColorSetting::all();
        $cssContent = ":root {\n";

        foreach ($colors as $color) {
            $cssContent .= "    --{$color->variable_name}: {$color->color_code};\n";
        }

        $cssContent .= "}";

        $cssPath = public_path('web/css/root.css');
        File::put($cssPath, $cssContent);
    }
}
