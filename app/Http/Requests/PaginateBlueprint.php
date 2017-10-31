<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginateBlueprint extends FormRequest
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
            'type' => 'required|string',
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
            'type.required' => __('Danh mục không tồn tại'),
            'type.string' => __('Danh mục không tồn tại'),
            'pageNo.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'pageNo.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'pageNo.integer' => __('Số trang không hợp lệ'),
        ];
    }
}
