<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlueprintRequest extends FormRequest
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
            'blueprint_name' => 'required|unique:blueprints,title|max:100',
            'img.*' => 'image|mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'blueprint_name.required' => __('Form.FillOutTitle'),
            'blueprint_name.unique' => __('Form.Duplicate'),
            'img.mimes' => __('Form.ImageType'),
            'img.image' => __('Your upload files ins\'t a images file')
        ];
    }
}
