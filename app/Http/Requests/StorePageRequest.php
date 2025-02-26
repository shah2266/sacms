<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'template'          => 'required|string|max:255',
            'title'             => 'required|string|max:255|unique:pages',
            'slug'              => 'required|string|max:255|unique:pages',
            'content'           => 'nullable',
            'seo_title'         => 'nullable|string',
            'seo_description'   => 'nullable|string',
            'seo_keywords'      => 'nullable|string',
            'status'            => 'required|integer|min:0|max:1',
        ];
    }
}
