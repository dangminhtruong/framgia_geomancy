<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApproveRequest extends FormRequest
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
            'requestId' => 'required|string|exists:request_blueprints,id',
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
            'requestId.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'requestId.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'requestId.exists' => __('Không tìm thấy yêu cầu thiết kế'),
        ];
    }
}
