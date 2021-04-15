<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'wx', 'namespace' => 'Modules\Wx\Http\Controllers'], function()
{
    //微信公众号配置
    Route::get('/wx_config', 'WxConfigController@index');
    Route::post('/wx_config','WxConfigController@store');
    //微信菜单
    Route::resource('wx_menu', 'WxMenuController');
});
