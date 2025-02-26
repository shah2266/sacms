<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMenuRequest extends FormRequest
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
                'required', 'string', 'max:20',
                Rule::unique('menus', 'name')->ignore($this->route('menu')->id)
            ],
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
