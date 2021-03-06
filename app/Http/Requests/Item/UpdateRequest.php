<?php

namespace App\Http\Requests\Item;

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
            'name' => 'required',
            'specifications' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'data' => 'mimes:pdf',
            'manual' => 'mimes:pdf'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'specifications.required' => 'The specifications are required.',
            'description.required' => 'The description are required.',
            'subcategory_id.required' => 'The subcategory is required.',
        ];
    }
}
