<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageHandler
{
    /**
     * Upload an image and resize it dynamically based on the provided dimensions.
     *
     * @param $image
     * @param string $folder
     * @param int|null $width
     * @param int|null $height
     * @return string
     */
    protected function uploadImage($image, string $folder, int $width = null, int $height = null): string
    {
        $imageUniqueName = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $uploadPath = public_path("$folder/$imageUniqueName");

        // If width and height are provided, resize accordingly, otherwise save original size
        if ($width && $height) {
            Image::make($image)->resize($width, $height)->save($uploadPath);
        } else {
            Image::make($image)->save($uploadPath);  // Save without resizing
        }

        return $imageUniqueName;
    }

    /**
     * Delete an image from the given path.
     *
     * @param $id
     * @param $folder
     * @param $model
     * @return void
     */
    protected function deleteImage($id, $folder, $model): void
    {
        $image = $model::where('id', $id)->first();
        $imagePath = "$folder/$image->image";

        if (File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }
    }

    /**
     * Delete an image from the given path.
     *
     * @param $file
     * @param $folder
     * @param $doc
     * @return void
     */
    protected function uploadDocument($file, $folder, $doc): string
    {
        $fileName = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder . $doc), $fileName);

        return $fileName;
    }

    /**
     * Delete an image from the given path.
     *
     * @param $id
     * @param $folder
     * @param $model
     * @return void
     */
    protected function deleteDocument($id, $folder, $model): void
    {
        $document = $model::where('id', $id)->first();
        $documentPath = "$folder/$document->document";

        if (File::exists(public_path($documentPath))) {
            File::delete(public_path($documentPath));
        }
    }
}
