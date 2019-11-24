<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddress extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //
        // $comment = Comment::find($this->route('comment')); => Route::post('comment/{comment}');
        // $this->user()->can('update', )
        //
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
            'street' => ['required', 'string', 'max:255'],
            'home_number' => ['required', 'string', 'max:10'],
            'apartment_number' => ['nullable', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:6'],
            'latitude' => ['nullable', 'numeric', 'between:-90,00.90,00'],
            'longitude' => ['nullable', 'numeric', 'between:-90,00.90,00']
        ];
    }
}
