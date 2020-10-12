<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pageCreate extends FormRequest
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
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'description_ar' => ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        /// error messages
        return [
            'name_ar.required' => __('validation.required'),
            'name_ar.string' => __('validation.string'),
            'name_en.required' => __('validation.required'),
            'name_en.string' => __('validation.string'),
            'description_ar.required' => __('validation.required'),
            'description_ar.string' => __('validation.string'),
            'description_en.required' => __('validation.required'),
            'description_en.string' => __('validation.string'),
            'img.required' => __('validation.required'),
            'img.image' => __('validation.image'),
        ];
    }
}
