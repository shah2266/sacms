<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuItemRequest extends FormRequest
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
            'menu_id'   => 'required|exists:menus,id',
            'title'     => 'required|string|max:255',
            'url'       => 'nullable',
            'page_id'   => 'required|exists:pages,id',
            //'type' => 'nullable|in:custom,page,category',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order'     => 'integer',
            'status'    => 'required|integer|min:0|max:1',
        ];
    }
}
