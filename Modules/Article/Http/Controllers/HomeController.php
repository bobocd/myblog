<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * 修改默认的加载路径
     */
    public function __construct()
    {
        $template=\HDModule::config('admin.config.template');
        $finder=app('view')->getFinder();
        $finder->prependLocation(public_path('templates/'.$template));
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('index');
    }


}
