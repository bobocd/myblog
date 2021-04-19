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
            ['title' => '自动回复设置', 'name' => 'Modules\Wx\Http\Controllers\WxReplyBaseController@index', 'guard' => 'web'],
            ['title' => '图文设置', 'name' => 'Modules\Wx\Http\Controllers\WxNewsController@index', 'guard' => 'web'],
        ],
    ],
];
