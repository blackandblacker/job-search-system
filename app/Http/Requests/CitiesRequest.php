<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitiesRequest extends FormRequest
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
            'city_name' => 'required',
            'country' => 'required'
        ];
    }

    public function  messages()
    {
        return [
            'city_name.required' => "Name of city is required",
            'country.required' => "Country field is required"
        ];
    }
}
