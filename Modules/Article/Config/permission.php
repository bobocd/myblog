<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/2 上午12:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
/**
 * 权限配置
 * 为了避免其他模块有同名的权限，权限标识要以 '控制器@方法' 开始
 */
return [
    [
        'group' => '栏目管理',
        'permissions' => [
            ['title' => '栏目列表', 'name' => 'Modules\Admin\Http\Controllers\CategoryController@index', 'guard' => 'web'],
            ['title' => '添加栏目', 'name' => 'Modules\Admin\Http\Controllers\CategoryController@store', 'guard' => 'web'],
            ['title' => '更新栏目', 'name' => 'Modules\Admin\Http\Controllers\CategoryController@update', 'guard' => 'web'],
            ['title' => '删除栏目', 'name' => 'Modules\Admin\Http\Controllers\CategoryController@destroy', 'guard' => 'web'],
        ],
    ],
    [
        'group' => '文章管理',
        'permissions' => [
            ['title' => '文章列表', 'name' => 'Modules\Admin\Http\Controllers\ArticleController@index', 'guard' => 'web'],
            ['title' => '添加文章', 'name' => 'Modules\Admin\Http\Controllers\ArticleController@store', 'guard' => 'web'],
            ['title' => '更新文章', 'name' => 'Modules\Admin\Http\Controllers\ArticleController@update', 'guard' => 'web'],
            ['title' => '删除文章', 'name' => 'Modules\Admin\Http\Controllers\ArticleController@destroy', 'guard' => 'web'],
        ],
    ],
];
