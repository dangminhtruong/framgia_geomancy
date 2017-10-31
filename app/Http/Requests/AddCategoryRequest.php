<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u|min:5|max:50',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('Hãy nhập tên danh mục'),
            'name.string' => __('Hãy nhập tên danh mục'),
            'name.regex' => __('Tên danh mục chỉ gồm chữ cái'),
            'name.min' => __('Tên danh mục tối thiểu 5 kí tự'),
            'name.max' => __('Tên danh mục tối đa 50 kí tự'),
        ];
    }
}
