<?php

namespace Modules\Wx\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Wx\Services\WeChatServer;
use Modules\Wx\Entities\WxNews;

class WxNewsController extends Controller
{
    //显示列表
    public function index()
    {
        $data = WxNews::get();
        return view('wx::wx_news.index', compact('data'));
    }

    //创建视图
    public function create(WeChatServer $weChatServer)
    {
        $ruleView=$weChatServer->ruleView();
        return view('wx::wx_news.create',compact('ruleView'));
    }

    //保存数据
    public function store(Request $request,WxNews $wx_news,WeChatServer $weChatServer)
    {
        \DB::transaction(function()use($request,$wx_news,$weChatServer){
            $wx_news=$weChatServer->ruleSave();
            $wx_news['rule_id']=$rule['id'];
            $wx_news['data']=$request->input('data');
            $wx_news->save();

        });
        return redirect('/wx/wx_news')->with('success', '保存成功');
    }

    //编辑视图
    public function edit(WxNews $wx_news,WeChatServer $weChatServer)
    {
        $ruleView=$weChatServer->ruleView($wx_news['rule_id']);
        return view('wx::wx_news.edit', compact('wx_news','ruleView'));
    }

    //更新数据
    public function update(Request $request,WxNews $wx_news,WeChatServer $weChatServer)
    {
        \DB::transaction(function()use($request,$wx_news,$weChatServer){
            $rule=$weChatServer->ruleSave();
            $wx_news['rule_id']=$rule['id'];
            $wx_news['data']=$request->input('data');
            $wx_news->save();

        });
        return redirect('/wx/wx_news')->with('success','更新成功');
    }

    //删除模型
    public function destroy(WxNews $wx_news)
    {
        $wx_news->delete();
        return redirect('wx/wx_news')->with('success','删除成功');
    }
}
