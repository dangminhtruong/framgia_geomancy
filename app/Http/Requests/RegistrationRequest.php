<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'r_name' => 'required|string|min:6|max: 10',
            'r_email' => 'required|string|email|max:100|unique:users,email',
            'r_password' => 'required|string|min:6|max:100|confirmed',
            'r_password_confirmation' => 'required'
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
            'r_name.required' => __('Tên hiển thị không được để trống'),
            'r_name.string' => __('Tên hiển thị không được để trống'),
            'r_name.min' => __('Tên hiển thị tối thiểu 6 ký tự'),
            'r_name.max' => __('Tên hiển thị tối đa 10 ký tự'),

            'r_email.required' => __('Email không được để trống'),
            'r_email.string' => __('Email không được để trống'),
            'r_email.email' => __('Email không đúng định dạng'),
            'r_email.max' => __('Email tối đa 100 ký tự'),
            'r_email.unique' => __('Email đã có người sử dụng'),

            'r_password.required' => __('Password không được để trống'),
            'r_password.string' => __('Password không được để trống'),
            'r_password.min' => __('Password tối thiểu 6 ký tự'),
            'r_password.max' => __('Password tối đa 100 ký tự'),
            'r_password.confirmed' => __('Password không trùng nhau'),

            'r_password_confirmation.required' => __('Không được để trống trường này'),
        ];
    }
}
