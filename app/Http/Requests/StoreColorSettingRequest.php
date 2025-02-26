<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColorSettingRequest extends FormRequest
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
            'variable_name' => 'required|unique:color_settings,variable_name|max:50',
            'color_code' => 'required|regex:/^#([A-Fa-f0-9]{3}){1,2}$/'
        ];
    }
}
