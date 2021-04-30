<?php

Route::group(['middleware' =>['web','auth'], 'prefix' => 'work', 'namespace' => 'Modules\Work\Http\Controllers'], function()
{
    //服务进万家工单
    Route::get('/fwjwj/deal','FwjwjController@deal');
    Route::post('/fwjwj/dealStore','FwjwjController@dealStore');
    Route::resource('fwjwj','FwjwjController');


});
Route::group(['middleware' =>'web', 'prefix' => 'work', 'namespace' => 'Modules\Work\Http\Controllers'], function()
{
    //MAS短信上行接收及状态接收
    Route::any('masSMS/masReply','MasSMSController@masReply');
    Route::any('masSMS/masStatus','MasSMSController@masStatus');
});

