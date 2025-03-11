<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFooterRequest extends FormRequest
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
            'name'      => [
                'required', 'string', 'max:255',
                Rule::unique('footers', 'name')->ignore($this->route('footer')->id)
            ],
            'file_name' => [
                'required','regex:/^[a-z0-9_-]+$/i',
                Rule::unique('footers', 'file_name')->ignore($this->route('footer')->id)
            ],
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'   => 'required|string',
        ];
    }
}
