<?php

namespace App\Http\Requests\Item;

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
            'name' => 'required',
            'specifications' => 'required',
            'subcategory_id' => 'required',
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'data' => 'required|mimes:pdf|max:51,200',
            'manual' => 'required|mimes:pdf|max:51,200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'specifications.required' => 'The specifications are required.',
            'subcategory_id.required' => 'The subcategory is required.',
            'data.required' => 'The datasheet file is required.',
            'manual.required' => 'The usermanual file is required.',
            'image.required' => 'The image is required.',
        ];
    }
}
