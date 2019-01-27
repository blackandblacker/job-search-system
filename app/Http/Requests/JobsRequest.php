<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsRequest extends FormRequest
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
        return ['position' => 'required',
                'job_description' => 'required',
                'city' => 'required',
                'cover_image' => 'image|nullable|max:1999'
               ];
    }

    public function messages()
    {
        return [
            'position.required' => "The position name is required",
            'job_description.required' => "Job Description is required",
            'city.required' => "City field is required"
        ];
    }
}
