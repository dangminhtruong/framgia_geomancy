<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SearchUserRequest extends FormRequest
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
            'search' => 'required|string',
            'page' => 'required|string|integer'
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
            'search.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'search.string' => __('Hãy nhập nội dung tìm kiếm'),
            'page.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'page.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'page.integer' => __('Có lỗi xảy ra, vui lòng thử lại')
        ];
    }
}

