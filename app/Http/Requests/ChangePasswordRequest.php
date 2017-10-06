<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'f_password' => 'required|string|min:6|max:100|confirmed',
            'f_password_confirmation' => 'required',
            'token' => 'required|string'
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
            'f_password.required' => __('Password không được để trống'),
            'f_password.string' => __('Password không được để trống'),
            'f_password.min' => __('Password tối thiểu 6 ký tự'),
            'f_password.max' => __('Password tối đa 100 ký tự'),
            'f_password.confirmed' => __('Password không trùng nhau'),

            'f_password_confirmation.required' => __('Không được để trống trường này'),

            'token.required' => __('Có lỗi xảy ra, vui lòng thử lại sau'),
            'token.string' => __('Có lỗi xảy ra, vui lòng thử lại sau'),
        ];
    }
}
