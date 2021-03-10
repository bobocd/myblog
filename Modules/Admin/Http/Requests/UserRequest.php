<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => "required|email|unique:users,email",
            'name'=>"required|min:2",
            'password' => "required|min:6",
        ];
    }

    /**
     * @消息描述
     */
    public function messages()
    {
        return [
            'email.required' => "账户不能为空",
            'email.unique' => "账户已经存在",
            'email.email'=>'请输入正确邮箱',
            'name.required' => "昵称不能为空",
            'name.min' => "昵称长度至少2位",
            'password.min' => "密码长度至少6位",
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
