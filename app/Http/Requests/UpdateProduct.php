<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string'],
            'pictures.*' => ['nullable', 'image', 'max:400', 'dimensions:max_width=1920,max_height:1080'],

            'category' => ['required', 'integer', 'exists:categories,id'],
            'subcategory' => ['required', 'integer', 'exists:categories,id'],
            'filters' => ['nullable', 'array', 'exists:filter_values,id'],

            'address' => ['required', 'integer', 'exists:user_addresses,id'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'premium' => ['nullable', 'boolean'],
            'visible' => ['nullable', 'boolean']
        ];
    }
}
