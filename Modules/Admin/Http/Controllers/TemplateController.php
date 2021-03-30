<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\TemplateService;

class TemplateController extends Controller
{
    public function index(TemplateService $templateService)
    {
        $templates=$templateService->all();
//        dd($templates);
        return view('admin::template.index',compact('templates'));
    }

    public function setDefaultTemplate($name){
//        dd(['template'=>$name]);
//        \HDModule::saveConfig(['template'=>$name],'config');

        return back()->with('success','模板设置成功');
    }
}
