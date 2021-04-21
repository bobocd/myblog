<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'article', 'namespace' => 'Modules\Article\Http\Controllers'], function()
{
//    Route::get('/', 'ArticleController@index');
    Route::resource('category','CategoryController');
    //文章缩率图上传
    Route::any('/article/upload','ArticleController@upload');
    Route::resource('article','ArticleController');
    //幻灯片图片上传
    Route::any('/slide/slideupload','SlideController@upload');
    Route::resource('slide','SlideController');


});
