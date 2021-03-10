<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpuserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>"nullable|min:2",
            'password' => "nullable|min:6",
        ];
    }

    /**
     * @消息描述
     */
    public function messages()
    {
        return [
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
