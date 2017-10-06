<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequireBlueprintRequest extends FormRequest
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
            'customer_phone' => 'unique:users,phone',
            'customer_email' => 'unique:users,email',
            'customer_retype_password' => 'same:customer_password'
        ];
    }

    public function messages()
    {
        return [
            'customer_phone.unique' => 'Your phone number has already taken !',
            'customer_email.unique' => 'Your email has already taken !',
            'customer_retype_password' => 'Retype password not matches'
        ];
    }
}
