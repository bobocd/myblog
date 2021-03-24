<?php

Route::group(['middleware' => 'web', 'prefix' => 'article', 'namespace' => 'Modules\Article\Http\Controllers'], function()
{
//    Route::get('/', 'ArticleController@index');
    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');
    Route::any('/upload','ImageController@upload');

});
