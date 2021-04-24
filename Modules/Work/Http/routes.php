<?php

Route::group(['middleware' =>['web','auth'], 'prefix' => 'work', 'namespace' => 'Modules\Work\Http\Controllers'], function()
{
    Route::get('/fwjwj/deal','FwjwjController@deal');
    Route::post('/fwjwj/dealStore','FwjwjController@dealStore');
    Route::resource('fwjwj','FwjwjController');
});
