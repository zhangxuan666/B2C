<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistPost extends FormRequest
{
  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'users_name' => 'required|unique:users|max:5',
            'users_pwd' => 'required',
        ];
    }

    public function messages()
{
    return [
        'users_name.required' => '用户名不能为空或不能超过5位',
        'users_pwd.required'  => '密码不能为空',
     
    ];
}
}
