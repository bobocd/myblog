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
        return view('admin::template.index',compact('templates'));
    }

    public function setDefaultTemplate($name){
        $config=\HDModule::config('admin.config');
        $config['template']=$name;
        $str=var_export($config,true);
        $str="<?php return ".$str.";";

        file_put_contents(dirname(__file__,3).'/Config/config.php',$str);

        return back()->with('success','模板设置成功');
    }
}
