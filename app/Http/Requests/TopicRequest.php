<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|string',
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
            'name.required' => 'Yêu cầu nhập chủ đề',
            'name.max' => 'Nhập quá 255 ký tự',
            'description.required'  => 'Yêu cầu nhập mô tả',
            'description.max' => 'Nhập quá 255 ký tự',
            'thumbnail.image'     => 'Không phải ảnh',
            'thumbnail.mimes'     => 'Yêu cầu ảnh: jpg,png,jpeg',
            'thumbnail.max'     => 'Kích thước ảnh quá 2MB',
            'status.required'     => 'Yêu cầu chọn trạng thái',
            'status.string'     => 'Sai định dạng trạng thái',
        ];
    }
}
