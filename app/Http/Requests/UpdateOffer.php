<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOffer extends FormRequest
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
            'accepted_at' => ['nullable', 'date', 'date_format:Y-m-d'],
            'rejected_at' => ['nullable', 'date', 'date_format:Y-m-d']
        ];
    }
}
