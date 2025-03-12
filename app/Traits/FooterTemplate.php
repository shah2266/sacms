<?php

namespace App\Traits;

use App\Models\Footer;
use Illuminate\Support\Facades\File;

trait FooterTemplate
{
    protected $folder = 'web/img/footer_preview_image';
    protected $width = 800;
    protected $height = 300;

    public function createTemplate($data)
    {
        $data['width'] = $data['width'] ?? $this->width;
        $data['height'] = $data['height'] ?? $this->height;

        $filePath = resource_path("views/web/footer/templates/{$data['file_name']}.blade.php");
        File::put($filePath, $data['content']);

        if(File::isFile($data['image'])) {
            $image = $this->uploadImage($data['image'], $this->folder, $data['width'], $data['height']);
        }

        return Footer::create([
            'name' => $data['name'],
            'file_name' => $data['file_name'],
            'image' => $image ?? null,
            'order' => Footer::max('order') + 1,
        ]);
    }

    public function updateTemplate(Footer $template, $data): bool
    {
        $data['width'] = $data['width'] ?? $this->width;
        $data['height'] = $data['height'] ?? $this->height;

        $oldFilePath = resource_path("views/web/footer/templates/{$template->file_name}.blade.php");
        $newFilePath = resource_path("views/web/footer/templates/{$data['file_name']}.blade.php");

        // Check if file_name is changed and rename the file
        if ($template->file_name !== $data['file_name'] && File::exists($oldFilePath)) {
            File::move($oldFilePath, $newFilePath);
        } else {
            // If the file name hasn't changed, just update its content
            File::put($newFilePath, $data['content']);
        }

        $image = $template->image;

        if(isset($data['image']) && File::isFile($data['image'])) {
            $this->deleteImage($template->id, $this->folder, Footer::class);
            $image = $this->uploadImage($data['image'], $this->folder, $data['width'], $data['height']);
        }

        return $template->update([
            'name' => $data['name'],
            'file_name' => $data['file_name'],
            'image' => $image,
        ]);
    }


    public function deleteTemplate(Footer $template)
    {
        $filePath = resource_path("views/web/footer/templates/{$template->file_name}.blade.php");
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        return $template->delete();
    }

    public function activateTemplate($id)
    {
        Footer::query()->update(['is_active' => false]);
        return Footer::where('id', $id)->update(['is_active' => true]);
    }

    public function updateOrder($orders)
    {
        foreach ($orders as $index => $id) {
            Footer::where('id', $id)->update(['order' => $index]);
        }
    }
}
