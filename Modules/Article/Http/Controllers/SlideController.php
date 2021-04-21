<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Slide;
use App\Handlers\ImageUploadHandler;
use App\Handlers\TemplatePathHandler;

class SlideController extends Controller
{
    //显示列表
    public function index()
    {
        $data = Slide::paginate(10);
        return view('article::slide.index', compact('data'));
    }

    //创建视图
    public function create(Slide $slide)
    {
        return view('article::slide.create',compact('slide'));
    }

    //保存数据
    public function store(Request $request, Slide $slide)
    {

        $slide->fill($request->all());
        $slide->save();

        return redirect('/article/slide')->with('success', '保存成功');
    }


    //编辑视图
    public function edit(Slide $slide)
    {
        return view('article::slide.edit', compact('slide'));
    }

    //更新数据
    public function update(Request $request, Slide $slide)
    {
        $slide->update($request->all());
        return redirect('/article/slide')->with('success','更新成功');
    }

    //删除模型
    public function destroy(Slide $slide)
    {
        $slide->delete();
        return redirect('article/slide')->with('success','删除成功');
    }
    //图片上传
    public function  upload(Request $request,ImageUploadHandler $uploader,TemplatePathHandler $temp){

        $template=$temp->getTemplatePath();

        // 初始化返回数据，默认是失败的
        $data = [
            'code'=>201,
            'msg' => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($request->file) {
            // 保存图片到本地
            $result = $uploader->save($request->file, $template['controller'], \Auth::user()['name'], 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg'] = "上传成功!";
                $data['code'] = 0;
            }
        }
        return json_encode($data);
    }
}
