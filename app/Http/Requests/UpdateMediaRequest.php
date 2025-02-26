<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'file_name'         => 'nullable|string',
            'file_size'         => 'nullable|integer',
            'file_type'         => 'nullable|string',
            'file_path'         => 'nullable|string',
            'alt_text'          => 'nullable|string',
            'width'             => 'nullable|integer',
            'height'            => 'nullable|integer',
        ];
    }
}
