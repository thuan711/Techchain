<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapSanpham extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() { return true;}
    public function rules() {
        return [
            'ten_sp' => ['string','required','min:2','max:100'],
            'gia' => ['numeric','required','integer', 'min:0'],
            'gia_km' => ['numeric','integer', 'min:0'],
            'ngay' => ['date'],
            'hinh' => ['string'],
        ];
    }
    public function messages(){ return [
        'ten_sp.string' => 'Nhập tên sản phẩm là chuỗi ',
        'ten_sp.required' => 'Bạn chưa nhập tên sản phẩm',
        'ten_sp.min' => 'Tên sản phẩm ngắn quá vậy',
        'ten_sp.max' => 'Tên sản phẩm dài quá',
        'gia.required' => 'Bạn chưa nhập giá sản phẩm',
        'gia.min' => 'Nhập giá lớn hơn 0 nhé',
        'gia_km.min' => 'Nhập giá lớn hơn 0 nhé',
        'ngay.date' =>'Nhập đúng dạng ngày dd-mm-yy!',
        'hinh.string' =>'Nhập hình là chuỗi.'
      ];
    }
}
