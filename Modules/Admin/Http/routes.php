<?php
//后台管理
Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
    //用户管理
    Route::get('/', 'AdminController@index');
    Route::get('/user', 'AdminController@index');
    Route::post('/user', 'AdminController@store');
    Route::put('/user/{user}', 'AdminController@update');
    Route::DELETE('/user/{user}', 'AdminController@destroy');
    //添加用户角色
    Route::get('user/role/{user}','AdminController@addRole');
    Route::post('user/role/{user}','AdminController@rolestore');
    //角色管理
    Route::resource('role','RoleController');
    //添加角色权限
    Route::get('role/permission/{role}','RoleController@permission');
    Route::post('role/permission/{role}','RoleController@permissionstore');
    //添加用户权限
    Route::get('user/permission/{user}','AdminController@permission');
    Route::post('user/permission/{user}','AdminController@permissionstore');
});
//Route::get('/', 'Modules\Admin\Http\Controllers\AdminController@index');
