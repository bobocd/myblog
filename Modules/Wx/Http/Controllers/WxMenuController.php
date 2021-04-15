<?php

namespace Modules\Wx\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Wx\Entities\WxMenu;

class WxMenuController extends Controller
{
    //显示列表
    public function index()
    {
        $data = WxMenu::paginate(10);
        return view('wx::wx_menu.index', compact('data'));
    }

    //创建视图
    public function create()
    {
        return view('wx::wx_menu.create');
    }


    //保存数据
    public function store(Request $request,WxMenu $wx_menu)
    {
//        dd($request->all());
        $wx_menu->name=$request->input('name');
        $wx_menu->data=json_encode($request->input('data'));

        $wx_menu->save();

        return redirect('/wx/wx_menu')->with('success', '保存成功');
    }


    //编辑视图
    public function edit(WxMenu $wx_menu)
    {
        return view('wx::wx_menu.edit', compact('wx_menu'));
    }

    //更新数据
    public function update(Request $request, WxMenu $wx_menu)
    {
        $wx_menu->name=$request->input('name');
        $wx_menu->data=$request->input('data');
        $wx_menu->save();
        return redirect('/wx/wx_menu')->with('success','更新成功');
    }

    //删除模型
    public function destroy(WxMenu $wx_menu)
    {
        $wx_menu->delete();
        return redirect('wx/wx_menu')->with('success','删除成功');
    }
}
