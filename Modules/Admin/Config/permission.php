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
        'group' => '用户管理',
        'permissions' => [
            ['title' => '用户列表', 'name' => 'Modules\Admin\Http\Controllers\AdminController@index', 'guard' => 'web'],
            ['title' => '添加用户', 'name' => 'Modules\Admin\Http\Controllers\AdminController@create', 'guard' => 'web'],
            ['title' => '编辑用户', 'name' => 'Modules\Admin\Http\Controllers\AdminController@edit', 'guard' => 'web'],
            ['title' => '删除用户', 'name' => 'Modules\Admin\Http\Controllers\AdminController@destroy', 'guard' => 'web'],
            ['title' => '修改用户权限', 'name' => 'Modules\Admin\Http\Controllers\AdminController@permission', 'guard' => 'web'],
        ],
    ],
    [
        'group' => '角色管理',
        'permissions' => [
            ['title' => '角色列表', 'name' => 'Modules\Admin\Http\Controllers\RoleController@index', 'guard' => 'web'],
            ['title' => '添加角色', 'name' => 'Modules\Admin\Http\Controllers\RoleController@create', 'guard' => 'web'],
            ['title' => '编辑角色', 'name' => 'Modules\Admin\Http\Controllers\RoleController@edit', 'guard' => 'web'],
            ['title' => '删除角色', 'name' => 'Modules\Admin\Http\Controllers\RoleController@destroy', 'guard' => 'web'],
            ['title' => '修改角色权限', 'name' => 'Modules\Admin\Http\Controllers\RoleController@permission', 'guard' => 'web'],
        ],
    ],
    [
        'group' => '模块管理',
        'permissions' => [
            ['title' => '模块列表', 'name' => 'Modules\Admin\Http\Controllers\ModuleController@index', 'guard' => 'web'],
            ['title' => '更新缓存', 'name' => 'Modules\Admin\Http\Controllers\ModuleController@updateCache', 'guard' => 'web'],
        ],
    ],
];
