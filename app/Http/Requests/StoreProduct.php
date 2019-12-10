<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'price' => ['required', 'numeric', 'min:0.01'],
            'premium' => ['required', 'boolean'],
            'visible' => ['required', 'boolean'],

            'pictures.*' => ['nullable', 'image', 'max:400', 'dimensions:max_width=1920,max_height:1080']
        ];
    }
}
