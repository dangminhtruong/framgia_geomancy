<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LockAccountRequest extends FormRequest
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
            'userId' => 'required|string|exists:users,id',
            'reason' => 'required|string|regex:/^[\pL\s\-]+$/u|min:10|max:30'
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
            'userId.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'userId.string' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'userId.exists' => __('Không tìm thấy tài khoản'),

            'reason.required' => __('Lý do không được để chống'),
            'reason.string' => __('Lý do không được để chống'),
            'reason.regex' => __('Lý do chỉ gồm chữ'),
        ];
    }
}
