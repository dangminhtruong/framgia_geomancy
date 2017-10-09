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
            'customer_description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'customer_description.required' => __('Form.FillOutDesc')
        ];
    }
}
