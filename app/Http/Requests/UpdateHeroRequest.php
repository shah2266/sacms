<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHeroRequest extends FormRequest
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
            'page_id'       => 'required|integer',
            'title'         => [
                'required', 'string', 'max:255',
                Rule::unique('heroes', 'title')->ignore($this->route('hero')->id),
            ],
            'title_color'           => 'nullable',
            'sub_title'             => 'nullable|string|max:255',
            'sub_title_color'       => 'nullable',
            'type'                  => 'required|string',
            'short_description'     => 'nullable',
            'bg_color'              => 'nullable',
            'link1'                 => 'nullable|url',
            'link2'                 => 'nullable|url',
            'image'                 => 'nullable|mimes:jpeg,jpg,png,gif',
            'status'                => 'required',
        ];
    }
}
