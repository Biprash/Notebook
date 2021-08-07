<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user()->getKey())],
            'profile_pic' => ['image', 'mimes:png,jpg,jpeg', 'max:5120'],
            'socialLinks' => ['array', 'nullable'],
            'socialLinks.*.type' => ['required'],
            'socialLinks.*.link' => ['required'],
        ];
    }
}