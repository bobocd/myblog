<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/2 上午12:54
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
/**
 * 后台菜单配置
 * 下面是属性说明：
 * title 菜单栏目
 * icon 图标参考 http://fontawesome.dashgame.com/
 * menus 子菜单
 * permission 权限标识，必须在permission.php配置文件中存在
 */
return [
    'Wx'=>[
        "title"      => "微信公众号管理",
        "icon"       => "fa fa-cc-mastercard",
        'permission' => '权限标识',
        "menus"      => [
            ["title" => "参数配置", "permission" => "Modules\\Admin\\Http\\Controllers\\WxConfigController@index", "url" => "/wx/wx_config"],
            ["title" => "菜单设置", "permission" => "Modules\\Admin\\Http\\Controllers\\WxMenuController@index", "url" => "/wx/wx_menu"],
            ["title" => "自动回复设置", "permission" => "Modules\\Admin\\Http\\Controllers\\WxReplyBaseController@index", "url" => "/wx/wx_reply_base"],
            ["title" => "图文设置", "permission" => "Modules\\Admin\\Http\\Controllers\\WxNewsController@index", "url" => "/wx/wx_news"],
        ],
    ],
];
