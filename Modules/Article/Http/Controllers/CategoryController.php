<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Category;
use Modules\Article\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Category $category)
    {
        $categories=$category->getAll();
        foreach ($categories as $k=>$v){
            if($v['pid']!=0){
                $pidName=\DB::table('categories')->where('id','=',$v['pid'])->get();
                $v['pidName']=$pidName[0]->name;
                $categories[$k]=$v;
            }
        }
        return view('article::category.index',compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CategoryRequest $request,Category $category)
    {
        $category->fill($request->all());
        $category->save();
        session()->flash('栏目添加成功');
        return back();

    }


    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(CategoryRequest $request,Category $category)
    {
        $category->update($request->all());
        return redirect('/article/category')->with('success', '栏目更新成功');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Category $category)
    {

        if ($category->hasChildCategory()) {
            return back()->with('danger', '请先删除子栏目');
        }
        $category->delete();
        return redirect('/article/category')->with('success', '栏目删除成功');
    }
}
