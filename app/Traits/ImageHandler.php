<?php

namespace App\Traits;

use App\Models\Company;
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
        $uploadPath = $this->getStoragePath("$folder/$imageUniqueName");

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
        $fullPath = $this->getStoragePath($imagePath);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
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
        $destinationPath = $this->getStoragePath("$folder$doc");

        $file->move($destinationPath, $fileName);

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
        $fullPath = $this->getStoragePath($documentPath);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    /**
     *
     * @param string $path
     * @return string
     */
    protected function getStoragePath(string $path): string
    {
        return file_exists(public_path()) ? public_path($path) : $path;
    }


    protected function matchedCurrentHost(): bool
    {
        $company = Company::where('status', 1)->first();
        return $this->normalizeUrl(config('app.url')) === $this->normalizeUrl($company->website);
    }

    protected function normalizeUrl($url): string
    {
        return preg_replace('/^www\./', '', parse_url($url, PHP_URL_HOST) ?? $url);
    }
}
