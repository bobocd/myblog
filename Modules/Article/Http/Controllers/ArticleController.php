<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redis;
use Modules\Article\Entities\Article;
use Modules\Article\Entities\Category;
use Modules\Article\Http\Requests\ArticleRequest;
use App\Handlers\ImageUploadHandler;
use App\Handlers\TemplatePathHandler;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Article $article)
    {
//        $listkey ="LIST:ARTICLE";
//        $Shashkey ="HASH:ARTICLE";
//
//        if(Redis::exists($listkey)){
//            $lists = Redis::lrange($listkey,0,-1); //获取所有元素
//            foreach ($lists as $k=>$v){
//                $arts[]=Redis::hgetall($Shashkey.$v);
//            }
//        }else{
//            $arts = Article::get()->toArray();
//            foreach ($arts as $k=>$v){
//                Redis::rpush($listkey,$v['id']);
//                Redis::hmset($Shashkey.$v['id'],$v);
//            }
//
//        }




        $data=$article->paginate(10) ;
        return view('article::article.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Category $category)
    {
        $categories= $category->getAll();
        return view('article::article.create',compact('categories'));
    }

    //保存数据
    public function store(ArticleRequest $request,Article $article)
    {
        $content=$request->all();
        $data['title']=$content['title'];
        $data['digest']=$content['digest'];
        $data['author']=$content['author'];
        $data['content']=$content['content'];
        $data['thumb']=$content['thumb'];
        $data['click']=$content['click'];
        $data['category_id']=$content['category_id'];
        $data['iscommend']=$content['iscommend'];
        $d=$article->fill($data);
        if($article->save()){
//            foreach ($content['tag'] as $v){
//                DB::table('tag_article')->insert(['article_id'=>$d['id'],'tag_id'=>$v]);
//            }
        }

        return redirect('/article/article')->with('success', '保存成功');
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Category $category,Article $article)
    {
        $categories= $category->getAll();
        return view('article::article.edit',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $content=$request->all();
        $data['title']=$content['title'];
        $data['digest']=$content['digest'];
        $data['author']=$content['author'];
        $data['content']=$content['content'];
        $data['thumb']=$content['thumb'];
        $data['click']=$content['click'];
        $data['category_id']=$content['category_id'];
        $data['iscommend']=$content['iscommend'];
        if($article->update($data)){
//            DB::table('tag_article')->where('article_id','=',$article['id'])->delete();
//            foreach ($content['tag'] as $v){
//                DB::table('tag_article')->insert(['article_id'=>$article['id'],'tag_id'=>$v]);
//            }
        }
        return redirect('/article/article')->with('success','更新成功');
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('article/article')->with('success','删除成功');
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
