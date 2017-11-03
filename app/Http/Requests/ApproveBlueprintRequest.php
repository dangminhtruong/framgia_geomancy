<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApproveBlueprintRequest extends FormRequest
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
            'blueprintId' => 'required|string|exists:blueprints,id',
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
            'blueprintId.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'blueprintId.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'blueprintId.exists' => __('Không tìm thấy thiết kế'),
        ];
    }
}
