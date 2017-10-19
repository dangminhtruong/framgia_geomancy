<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductRequest extends FormRequest
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
            'id' => 'required|exists:products,id',
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'price' => 'required|string|numeric',
            'stock' => 'required|string|numeric',
            'categories_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg'
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
            'id.required' => __('Có lỗi xảy ra, vui lòng thử lại'),
            'id.exists' => __('Sản phẩm không tồn tại'),

            'name.required' => __('Tên không được để trống'),
            'name.string' => __('Tên không được để trống'),
            'name.regex' => __('Tên không hợp lệ'),

            'price.required' => __('Giá không được để trống'),
            'price.string' => __('Giá không được để trống'),
            'price.numeric' => __('Giá không hợp lệ'),

            'stock.required' => __('Số lượng không được để trống'),
            'stock.string' => __('Số lượng không được để trống'),
            'stock.numeric' => __('Số lượng không hợp lệ'),

            'categories_id.exists' => __('Danh mục không được để trống'),
            'categories_id.string' => __('Danh mục không được để trống'),

            'image.image' => __('File không hợp lệ'),
            'image.mimes' => __('Ảnh phải là jpeg, png hoặc jpg'),
        ];
    }
}
