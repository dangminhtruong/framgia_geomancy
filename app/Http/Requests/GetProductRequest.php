<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetProductRequest extends FormRequest
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
            'categories_id' => 'required|string|exists:categories,id',
            'pageNo' => 'required|string|integer'
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
             'categories_id.required' => __('Danh mục không tồn tại 2'),
             'categories_id.string' => __('Danh mục không tồn tại 3'),
             'categories_id.exists' => __('Danh mục không tồn tại 4'),

             'pageNo.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
             'pageNo.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
             'pageNo.integer' => __('Số trang không hợp lệ'),
         ];
     }
}
