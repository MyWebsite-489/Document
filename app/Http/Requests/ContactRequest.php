<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:120',
            'phone' => 'required|max:120',
            'email' => 'required|max:120|email',
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
            'fullname.required' => 'Yêu cầu nhập họ và tên',
            'fullname.max' => 'Nhập quá 120 ký tự',
            'phone.required' => 'Yêu cầu nhập sđt',
            'phone.max' => 'Nhập quá 120 ký tự',
            'phone.max' => 'Nhập quá 120 ký tự',
            'email.required' => 'Yêu cầu nhập email',
            'email.max' => 'Nhập quá 120 ký tự',
            'email.email' => 'Yêu cầu nhập đúng dạng email',
        ];
    }
}
