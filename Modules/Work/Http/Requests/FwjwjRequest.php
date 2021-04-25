<?php

namespace Modules\Work\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FwjwjRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:3|max:10',
        ];
    }
    //错误信息处理
    public function messages(){
        return [
            'title.required'=>'标题不能为空',
            'title.min'=>'标题不能少于3个字符',
            'title.max'=>'标题不能超过10个字符',
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
