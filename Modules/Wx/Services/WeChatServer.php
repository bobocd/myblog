<?php
/**
 * Created by PhpStorm.
 * User: Alice
 * Date: 2019/7/31
 * Time: 23:01
 */

namespace Modules\Wx\Services;


use Modules\Wx\Entities\WxRule;

class WeChatServer
{
    public function ruleView($id=0){
        $rule=WxRule::findOrNew($id);

        $_rule=old('_rule',json_encode([
            'id'=>$rule['id']?:0,
            'name'=>$rule['name']?:'',
            'keywords'=>$rule->keyword()->get()->toArray()??[['key'=>'']],
        ]));
        return view('wx::wechat_server.rule',compact('_rule'));
    }

    public function ruleSave(){

        $post=json_decode(request()->input('_rule'),true);

        \Validator::make($post,['name'=>"required"],['name.required'=>'规则名称不能为空'])->validate();
        $rule=WxRule::findOrNew($post['id']);
        $rule['name']=$post['name'];
        $rule['action']=$this->getTemplatePath()['controller'];
        $rule['module']=\HDModule::currentModule();
        $rule->save();

        $rule->keyword()->delete();

        foreach ($post['keywords'] as $key){
            if($key){
                $rule->keyword()->create($key);
            }
        }
        return $rule;

    }
    final protected function getTemplatePath()
    {
        $arr=[];
        list($class, $method) = explode('@', request()->route()->getActionName());

        //方法名
        $arr['method']=$method;
        // 控制器名称
        $arr['controller']=str_replace('Controller', '', substr(strrchr($class, '\\'), 1));

        // 模块名
        $arr['module'] = str_replace(
            '\\',
            '.',
            str_replace(
                'App\\Http\\Controllers\\',
                '',
                trim(
                    implode('\\', array_slice(explode('\\', $class), 0, -1)),
                    '\\'
                )
            )
        );
        return $arr;
    }
}
