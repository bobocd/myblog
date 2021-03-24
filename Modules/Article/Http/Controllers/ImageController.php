<?php

namespace Modules\Article\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ImageController extends Controller
{
    public function  upload(Request $request,ImageUploadHandler $uploader){

//        dd($request->file);
        // 初始化返回数据，默认是失败的
        $data = [
            'code'=>201,
            'msg' => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($request->file) {
            // 保存图片到本地
            $result = $uploader->save($request->file, 'article', 'Root', 1024);
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
