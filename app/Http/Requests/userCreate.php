<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userCreate extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'mobile' => ['required', 'max:255', 'unique:users'],
            'image' => ['required', 'image'],
            'user_type' => 'required|in:admin,client,representative',
            'gender' => 'required|in:male,female',
            'birth_date' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        /// error messages
        return [
            'name.required' => __('validation.required'),
            'name.string' => __('validation.string'),
            'email.required' => __('validation.required'),
            'email.unique' => __('validation.unique'),
            'email.email' => __('validation.email'),
            'password.required' => __('validation.required'),
            'password.min' => __('validation.min'),
            'password.confirmed' => __('validation.confirmed'),
            'username.required' => __('validation.required'),
            'username.string' => __('validation.string'),
            'phone.required' => __('validation.required'),
            'phone.unique' => __('validation.unique'),
            'telephone.required' => __('validation.required'),
            'city_id.required' => __('validation.required'),
            'city_id.string' => __('validation.string'),
            'region.required' => __('validation.required'),
            'region.string' => __('validation.string'),
            'address.required' => __('validation.required'),
            'address.string' => __('validation.string'),
            'logo.required' => __('validation.required'),
            'logo.image' => __('validation.image'),
            'trade_license.required' => __('validation.required'),
            'trade_license.image' => __('validation.image'),
        ];
    }
}
