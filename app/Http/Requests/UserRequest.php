<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
      public function rules()
    {
        return [
            //            'ten'=>'unique:mptheloais,ten_danhmuc',

            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:10|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|alpha_dash',
            'laipassword'=>'required|confimed:password',
            'phone'=>'required|integer|size:10|regex:/(01)[0-9]{9}/'
        ];

    }
    public function messages(){
        return [
             'email.required'=>"Bạn chưa nhập Email",
             'email.email'=>'Bạn phải nhập đúng định dạng email',
             'email.unique'=>'Email này đã tồn tại trong dữ liệu',
             'password.required'=>'Bạn chưa nhập mật khẩu',
             'password.min'=>'Độ dài mật khẩu yếu bạn cần nhập từ 10 ký tự trở lên',
             'password.regex'=>'Mật khẩu bạn nhập chứa ký tự đặc biệt',
             'password.alpha_dash'=>'Mật khẩu bạn nhập không được cách',
             'laipassword.required'=>'Bạn chưa nhập lại mật khẩu',
             'laipassword.confimed'=>'Mật khẩu nhập lại không khớp với mật khẩu trên',
             'phone.required'=>'Bạn chưa nhập số điện thoại',
             'phone.integer'=>'Số điện thoại phải là số nguyên dương và có 10 ký tự',
             'phone.size'=>'Số điện thoại phải là số nguyên dương và có 10 ký tự',
             'phone.regex'=>'Bạn nhập chưa đúng số điện thoại',
        ];

    }
}
