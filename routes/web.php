<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/home','HomeController@index');

Route::get('/', function ( \Modules\Admin\Entities\Module $module) {
    $module=$module->getDefaultModule();
    $class='\Modules\\'.$module['name'].'\Http\Controllers\HomeController';
    return app()->build($class)->index();
});


Route::get('/home', 'HomeController@index')->name('home');

//微信配置
Route::any('wechat','WeChatController@handler');
