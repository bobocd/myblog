<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Article;
use Modules\Article\Entities\Category;
use Modules\Article\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Article $article)
    {
        $data=$article->paginate(10);
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
//        $data['thumb']=$content['thumb'];
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
    public function destroy()
    {

    }
}
