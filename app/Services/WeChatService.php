<?php
namespace App\Services;

use Houdunwang\WeChat\WeChat;
use Modules\Wx\Entities\WxConfig;
class WeChatService{
    public function __construct()
    {
        $config =array_merge(
            include base_path('config').'/hd_wechat.php',
            WxConfig::pluck('value','name')->toArray()
        );
        WeChat::config($config);
        WeChat::valid();
    }

    /**
     * @param $name
     * @param $arguments
     * @return 在对象中调用一个不可访问方法
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([WeChat::class,$name],$arguments);
    }
}
