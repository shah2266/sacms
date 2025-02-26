<?php

namespace App\Traits;

trait RequestValidation
{
    protected function validateRequest($rules, $uniqueFields = [], $modelClass = null, $modelInstance = null) {
        $data = request()->validate($rules);

        // Additional validation for unique fields
        if(request()->isMethod('POST')) {
            foreach ($uniqueFields as $field) {
                request()->validate([
                    $field => "required|string|max:255|unique:{$modelClass}",
                ]);
            }
        }

        // On Update, check unique validation
        if (request()->isMethod('PATCH') && $modelInstance) {
            foreach ($uniqueFields as $field) {
                $existingModel = $modelClass::where($field, request()->$field)->first();

                if ($existingModel && $existingModel->id !== $modelInstance->id) {
                    request()->validate([
                        $field => "required|string|unique:{$modelClass}",
                    ]);
                }
            }
        }

        return $data;
    }
}
