<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'f_email' => 'required|string|email|exists:users,email'
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
            'f_email.required' => __('Email không được để trống'),
            'f_email.string' => __('Email không được để trống'),
            'f_email.email' => __('Email không đúng định dạng'),
            'f_email.exists' => __('Không tìm thấy địa chỉ email'),
        ];
    }
}
