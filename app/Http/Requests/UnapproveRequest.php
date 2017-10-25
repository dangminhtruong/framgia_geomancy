<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnapproveRequest extends FormRequest
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
            'request_Id' => 'required|string|exists:request_blueprints,id',
            'message' => 'required|string',
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
            'request_Id.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'request_Id.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'request_Id.exists' => __('Không tìm thấy yêu cầu thiết kế'),
            'message.required' => __('Hãy nhập lý do'),
            'message.string' => __('Hãy nhập lý do')
        ];
    }
}
