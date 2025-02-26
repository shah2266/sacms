<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    protected $folder = 'web/img/media';
    protected $width = 500;
    protected $height = 500;


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $medias = Media::all();
        return view('admin.media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $media = new Media();
        return view('admin.media.create', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMediaRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMediaRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['width'] = $data['width'] ?? $this->width;
        $data['height'] = $data['height'] ?? $this->height;
        if(File::isFile($request->image)) {
            $uploadedFile = $request->file('image');

            // Upload image and get the stored file name
            $image = $this->uploadImage($uploadedFile, $this->folder, $data['width'], $data['height']);

            // Construct full file path
            $filePath = $this->folder . '/' . $image;

            // Add additional file details
            $data['image'] = $image;
            $data['file_path'] = $filePath;
            $data['file_type'] = $uploadedFile->getClientMimeType();
            $data['file_size'] = $uploadedFile->getSize();
            $data['alt_text'] = $request->alt_text ?? null;
        }

        Media::create($data);

        return redirect()->route('admin.media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Media $media
     * @return void
     */
    public function show(Media $media)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $media
     * @return Application|Factory|View
     */
    public function edit(Media $media)
    {
        return view('admin.media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMediaRequest $request
     * @param Media $media
     * @return RedirectResponse
     */
    public function update(UpdateMediaRequest $request, Media $media): RedirectResponse
    {
        $data = $request->validated();

        $data['width'] = $data['width'] ?? $this->width;
        $data['height'] = $data['height'] ?? $this->height;

        if(File::isFile($request->image)) {
            $this->deleteImage($media->id, $this->folder, Media::class);
            //$data['image'] = $this->uploadImage($request->file('image'), $this->folder, 400, 500);
            $uploadedFile = $request->file('image');

            // Upload image and get the stored file name
            $image = $this->uploadImage($uploadedFile, $this->folder, $data['width'], $data['height']);

            // Construct full file path
            $filePath = $this->folder . '/' . $image;

            // Add additional file details
            $data['image'] = $image;
            $data['file_path'] = $filePath;
            $data['file_type'] = $uploadedFile->getClientMimeType();
            $data['file_size'] = $uploadedFile->getSize();
            $data['alt_text'] = $request->alt_text ?? null;
        }

        $media->update($data);

        return redirect()->route('admin.media.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Media $media
     * @return RedirectResponse
     */
    public function destroy(Media $media): RedirectResponse
    {
        $this->deleteImage($media->id, $this->folder, Media::class);
        $media = Media::findOrFail($media->id);
        $media->delete();

        return redirect()->route('admin.media.index');
    }
}
