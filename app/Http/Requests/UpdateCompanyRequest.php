<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
            'company_name'      => [
                'required', 'string', 'max:255',
                Rule::unique('companies', 'company_name')->ignore($this->route('company')->id)
            ],
            'short_name'        => 'required|string|max:255',
            'address'           => 'required|string|max:255',
            'phone'             => 'required',
            'email'             => 'required|string|email|max:255',
            'website'           => 'required|url|max:255',
            'favicon'           => 'nullable|mimes:jpeg,jpg,png,gif|dimensions:max_width=192,max_height=192',
            'image'             => 'nullable|mimes:jpeg,jpg,png,gif',
            'width'             => 'nullable|integer',
            'height'            => 'nullable|integer',
            'business_model'    => 'nullable|string|max:255',
            'number_of_offices' => 'nullable|string|max:255',
            'mission_statement' => 'nullable|string|max:255',
            'vision_statement'  => 'nullable|string|max:255',
            'copy_right_statement' => 'required|string|max:255',
            'founded_date'      => 'nullable',
            'employee_count'    => 'nullable|integer',
            'facebook'          => 'nullable|url|max:255',
            'youtube'           => 'nullable|url|max:255',
            'linkedin'          => 'nullable|url|max:255',
            'status'            => 'required|integer|min:0|max:1',
        ];
    }
}
