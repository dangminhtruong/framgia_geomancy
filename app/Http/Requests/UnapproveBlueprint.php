<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnapproveBlueprint extends FormRequest
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
            'blueprint_Id' => 'required|string|exists:blueprints,id',
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
            'blueprint_Id.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'blueprint_Id.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'blueprint_Id.exists' => __('Không tìm thấy thiết kế'),
            'message.required' => __('Hãy nhập lý do'),
            'message.string' => __('Hãy nhập lý do')
        ];
    }
}
