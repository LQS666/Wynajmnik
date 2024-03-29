<?php

namespace App\Http\Requests;

use App\Filter;
use Illuminate\Foundation\Http\FormRequest;

class StoreFilter extends FormRequest
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
            'type' => ['required', 'in:' . Filter::getType(true)],
            'visible' => ['nullable', 'boolean'],
        ];
    }
}
