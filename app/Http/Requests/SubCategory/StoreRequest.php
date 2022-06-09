<?php

namespace App\Http\Requests\Subcategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'image.required' => 'The image is required.',
        ];
    }
}
