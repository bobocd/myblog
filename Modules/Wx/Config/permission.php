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
        'group' => '公众号管理',
        'permissions' => [
            ['title' => '参数配置', 'name' => 'Modules\Wx\Http\Controllers\WxConfigController@index', 'guard' => 'web'],
            ['title' => '菜单设置', 'name' => 'Modules\Wx\Http\Controllers\WxMenuController@index', 'guard' => 'web'],
            ['title' => '菜单创建', 'name' => 'Modules\Wx\Http\Controllers\WxMenuController@create', 'guard' => 'web'],
            ['title' => '菜单编辑', 'name' => 'Modules\Wx\Http\Controllers\WxMenuController@edit', 'guard' => 'web'],
            ['title' => '菜单删除', 'name' => 'Modules\Wx\Http\Controllers\WxMenuController@delete', 'guard' => 'web'],
            ['title' => '菜单推送微信', 'name' => 'Modules\Wx\Http\Controllers\WxMenuController@push', 'guard' => 'web'],
            ['title' => '自动回复设置', 'name' => 'Modules\Wx\Http\Controllers\WxReplyBaseController@index', 'guard' => 'web'],
            ['title' => '自动回复创建', 'name' => 'Modules\Wx\Http\Controllers\WxReplyBaseController@create', 'guard' => 'web'],
            ['title' => '自动回复编辑', 'name' => 'Modules\Wx\Http\Controllers\WxReplyBaseController@edit', 'guard' => 'web'],
            ['title' => '自动回复删除', 'name' => 'Modules\Wx\Http\Controllers\WxReplyBaseController@delete', 'guard' => 'web'],
            ['title' => '图文设置', 'name' => 'Modules\Wx\Http\Controllers\WxNewsController@index', 'guard' => 'web'],
            ['title' => '图文创建', 'name' => 'Modules\Wx\Http\Controllers\WxNewsController@create', 'guard' => 'web'],
            ['title' => '图文编辑', 'name' => 'Modules\Wx\Http\Controllers\WxNewsController@edit', 'guard' => 'web'],
            ['title' => '图文删除', 'name' => 'Modules\Wx\Http\Controllers\WxNewsController@delete', 'guard' => 'web'],
        ],
    ],
];
