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
            'Subcategory_id' => 'required',
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'data' => 'mimes:pdf',
            'manual' => 'mimes:pdf'
        ];
    }
}
