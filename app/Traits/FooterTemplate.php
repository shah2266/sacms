<?php

namespace App\Traits;

use App\Models\Footer;
use Illuminate\Support\Facades\File;

trait FooterTemplate
{
    public function createTemplate($data)
    {
        $filePath = resource_path("views/admin/footer/templates/{$data['file_name']}.blade.php");
        File::put($filePath, $data['content']);

        return Footer::create([
            'name' => $data['name'],
            'file_name' => $data['file_name'],
            'preview_image' => $data['preview_image'] ?? null,
            'order' => Footer::max('order') + 1,
        ]);
    }

    public function updateTemplate(Footer $template, $data): bool
    {
        $oldFilePath = resource_path("views/admin/footer/templates/{$template->file_name}.blade.php");
        $newFilePath = resource_path("views/admin/footer/templates/{$data['file_name']}.blade.php");

        // Check if file_name is changed and rename the file
        if ($template->file_name !== $data['file_name'] && File::exists($oldFilePath)) {
            File::move($oldFilePath, $newFilePath);
        } else {
            // If the file name hasn't changed, just update its content
            File::put($newFilePath, $data['content']);
        }

        return $template->update([
            'name' => $data['name'],
            'file_name' => $data['file_name'], // Update file name in the database
            'preview_image' => $data['preview_image'] ?? null,
        ]);
    }


    public function deleteTemplate(Footer $template)
    {
        $filePath = resource_path("views/admin/footer/templates/{$template->file_name}.blade.php");
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