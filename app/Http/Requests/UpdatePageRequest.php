<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
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
            'template'   => 'required|string',
            'title'      => [
                'required', 'string', 'max:255',
                Rule::unique('pages', 'title')->ignore($this->route('page')->id)
            ],
            'slug'      => [
                'required', 'string', 'max:255',
                Rule::unique('pages', 'slug')->ignore($this->route('page')->id)
            ],
            'content'           => 'nullable',
            'seo_title'         => 'nullable|string',
            'seo_description'   => 'nullable|string',
            'seo_keywords'      => 'nullable|string',
            'status'            => 'required|integer|min:0|max:1',
        ];
    }
}
