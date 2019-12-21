<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOffer extends FormRequest
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
            'product_id' => ['required', 'numeric', 'min:1', 'exists:products'],
            'desc' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'date_start' => ['nullable', 'date', 'date_format:Y-m-d'],
            'date_end' => ['nullable', 'date', 'date_format:Y-m-d'],
        ];
    }
}
