<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MptheloaiRequest extends FormRequest
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
            //
            'ten'=>'required|min:3',
            'thutu'=>'required|min:1|integer',
            'fImages'=>'image',
            'noidung'=>'required|min:5'
        ];
    }
    public function messages(){
        return [
             'ten.required'=>"Bạn chưa nhập tên thể loại",
             'ten.min'=>'Tên thể loại phải có độ dài lớn hơn hoặc bằng 3',
             'thutu.required'=>'Bạn chưa nhập thứ tự',
             'thutu.min'=>'Bạn phải nhập số nguyên dương lớn hơn 0',
             'thutu.integer'=>'Bạn phải nhập số nguyên dương lớn hơn 0',
             'fImages.image'=>'Bạn phải chọn tệp ảnh',
             'noidung.required'=>'Bạn chưa nhập nội dung',
             'noidung.min'=>'Nội dung cần điền phải có độ dài lớn hơn hoặc bằng 5'
        ];
    }
}
