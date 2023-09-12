<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleThanhToan extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules() {return [
        'tennguoinhan' => ['required','min:3','max:20'],
        'diachigiaohang' => ['required'],
        'dienthoai' => ['required|digits_between:10,11'],
        'email' => ['required','email'],
        ];
    }
    public function messages(){ return [
        'tennguoinhan.required' => 'Bạn chưa nhập họ tên',
        'tennguoinhan.min' => 'Họ tên tối thiểu 3 kí tự!',
        'tennguoinhan.max' => 'Họ tên dài tối thiểu 20 kí tự!',
        'diachigiaohang.required' => 'Bạn chưa nhập địa chỉ',
        'dienthoai.required' => 'Bạn chưa nhập địa chỉ',
        'dienthoai.digits_between' => 'Số điện thoại sai định dạng!',
        'email.required' => 'Bạn chưa nhập email!',
        'email.email' => 'Bạn nhập sai định dạng email!',
       ];
    }
}
