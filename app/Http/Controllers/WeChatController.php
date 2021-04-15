<?php

namespace App\Http\Controllers;

use Houdunwang\WeChat\WeChat;
use Modules\Wx\Entities\WxConfig;
use Modules\Wx\Entities\WxKeyword;

class WeChatController extends Controller
{

    public function __construct()
    {
        $this->valid();
    }
    public function valid(){
        $config =array_merge(
            include base_path('config').'/hd_wechat.php',
            WxConfig::pluck('value','name')->toArray()
        );
        WeChat::config($config);
        WeChat::valid();
    }
    public function handler(){

        //普通文本消息处理
        $instance = WeChat::instance('message');
        //关注用户扫描二维码事件
        if ($instance->isTextMsg())
        {
            $message  = $instance->getMessage();
            return $this->response($message->Content);
            //向用户回复消息
            //return $instance->text("你发送的内容是".$class);
        }
        //按钮消息处理
        $instance = WeChat::instance('button');
        //关注用户扫描二维码事件
        if ($instance->isClickEvent()) {
            //获取消息内容
            $message = $instance->getMessage();
            // return WeChat::instance('message')->text("点击了菜单,EventKey: {$message->EventKey}");
            return $this->response($message->EventKey);
        }
    }
    protected  function  response($key){
        $rule=WxKeyword::firstOrNew(['key'=>$key])->rule;
        $class='Modules\\'.$rule['module'].'\Response';
        return call_user_func_array([new $class,'handle'],[$rule]);
    }
}
