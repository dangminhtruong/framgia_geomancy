<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequireBlueprintRequest extends FormRequest
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
            'customer_description' => 'required',
            'request_blueprint_title' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'customer_description.required' => __('Form.FillOutDesc'),
            'request_blueprint_title.max' => __('Your title is too long. Just 100 character, plzz..')
        ];
    }
}
