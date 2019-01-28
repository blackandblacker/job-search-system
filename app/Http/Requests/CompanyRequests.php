<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequests extends FormRequest
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
            'name' => 'required',
            'city' => 'required',
            'adress' => 'required',
            'phone_number' => 'required|min:10|numeric',

        ];
    }

    public function  merge(array $input)
    {
        return [
               'name.required' => "Name of the company required",
               'city.required' => "City of the company required",
               'adress.required' => "Adress of the company required",
               'phone_number.required' => "Phone Number field is required"

        ];
    }
}
