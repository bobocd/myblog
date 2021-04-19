<?php
/**
 * Created by PhpStorm.
 * User: Alice
 * Date: 2019/8/3
 * Time: 22:40
 */

namespace Modules\Wx;


use Houdunwang\WeChat\WeChat;
use Modules\Wx\Entities\WxReplyBase;
use Modules\Wx\Entities\WxNews;

class Response
{
    public function handle($rule){
        if($rule['action']=="WxBaseReply"){
            $wx_reply_base= WxReplyBase::firstOrNew(['wx_rule_id'=>$rule['id']]);
            $contents=json_decode($wx_reply_base['content'],true);
            return  WeChat::instance('message')->text(array_random($contents)['content']);
        }elseif($rule['action']=="WxNews"){
            $news= WxNews::firstOrNew(['rule_id'=>$rule['id']]);
            $contents=json_decode($news['data'],true);
            return  WeChat::instance('message')->news($contents);
        }
//        return  WeChat::instance('message')->text($wx_reply_base['content']);
    }

}
