<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PaginateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->role == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pageNo' => 'required|string|integer',
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
            'pageNo.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'pageNo.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'pageNo.integer' => __('Số trang không hợp lệ'),
        ];
    }
}
