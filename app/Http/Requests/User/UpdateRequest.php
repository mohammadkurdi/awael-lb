<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            //
            'name' => 'required | max:255',
            'email' => 'required',
            'password' => 'confirmed | required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'email.required' => 'The email is required.',
            'password.required' => 'The password is required.',
            'role.required' => 'The role is required.',
        ];
    }
}
