<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Customer;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return Auth::check();
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u|min:5|max:30',
            'address' => 'nullable|min:6|max:100',
            'phone' => 'nullable|digits_between:10,12'
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
            'name.required' => __('Tên hiển thị không được để trống'),
            'name.string' => __('Tên hiển thị không được để trống'),
            'name.regex' => __('Tên hiển thị chỉ gồm chữ và khoảng trắng'),
            'name.min' => __('Tên hiển thị tối thiểu 5 ký tự'),
            'name.max' => __('Tên hiển thị tối đa 30 ký tự'),

            'address.min' => __('Địa chỉ tối thiểu 6 ký tự'),
            'address.max' => __('Địa chỉ tối đa 100 ký tự'),

            'phone.numeric' => __('Số điện thoại chỉ gồm số'),
            'phone.digits_between' => __('Số điện thoại từ 10 đến 12 chữ số'),
        ];
    }
}
