<?php
namespace Modules\Wx\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\WeChatService;
use Illuminate\Http\Request;
use Modules\Wx\Entities\WxReplyBase;
use Modules\Wx\Entities\WxRule;
use Modules\Wx\Services\WeChatServer;
use DB;
class WxReplyBaseController extends Controller
{
    //显示列表
    public function index()
    {

        $data = WxReplyBase::paginate(10);
        return view('wx::wx_reply_base.index', compact('data'));
    }

    //创建视图
    public function create(WeChatServer $weChatServer,$id=0)
    {
        $ruleView = $weChatServer->ruleView();
        $_reply=old('_reply',json_encode($reply['content']??[['content'=>'']]));
        return view('wx::wx_reply_base.create',compact('ruleView','_reply'));
    }

    //保存数据
    public function store(Request $request,WxReplyBase $wx_reply_base,WeChatServer $weChatServer)
    {

        \DB::transaction(function ()use($weChatServer,$wx_reply_base,$request){
            $rule=$weChatServer->ruleSave();
            $wx_reply_base->create(['wx_rule_id'=>$rule['id'],'content'=>$request->input('data')]);
        });


        return redirect('/wx/wx_reply_base')->with('success', '保存成功');
    }


    //编辑视图
    public function edit(WxReplyBase $wx_reply_base,WeChatServer $weChatServer)
    {
        $ruleView = $weChatServer->ruleView($wx_reply_base['wx_rule_id']);
        return view('wx::wx_reply_base.edit', compact('wx_reply_base','ruleView'));
    }

    //更新数据
    public function update(Request $request,WxReplyBase $wx_reply_base,WeChatServer $weChatServer)
    {

        \DB::transaction(function ()use($weChatServer,$wx_reply_base,$request){
            $rule=$weChatServer->ruleSave();
            $wx_reply_base->wx_rule_id=$rule['id'];
            $wx_reply_base->content=$request->input('data');
            $wx_reply_base->save();
        });
        return redirect('/wx/wx_reply_base')->with('success','更新成功');
    }

    //删除模型
    public function destroy($id)
    {

        DB::table('wx_rules')->where('id','=',$id)->delete();

        return redirect('wx/wx_reply_base')->with('success','删除成功');
    }
}
