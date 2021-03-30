<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Module;
use Modules\Admin\Services\ModuleService;

class ModuleController extends Controller
{
    //显示列表
    public function index(Module $module)
    {
        //$data = Module::paginate(10);
        $data=$module->get();
        return view('admin::module.index', compact('data'));
    }
    //更新前台是否可访问标识
    public function updateCache(ModuleService $moduleService){
        $moduleService->updateCache();
        return back()->with('success','模块缓存更新成功');
    }
    //设置首页默认访问
    public function setDefault(Module $module){
        $module->setDefault();
        return back()->with('success','模块缓存更新成功');
    }
}
