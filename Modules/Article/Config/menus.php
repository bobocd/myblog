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
    'Article'=>[
        "title"      => "栏目管理",
        "icon"       => "fa fa-navicon",
        'permission' => ['Modules\Article\Http\Controllers\CategoryController@index'],
        "menus"      => [
            ["title" => "分类管理", "permission" => "Modules\Article\Http\Controllers\CategoryController@index", "url" => "/article/category"],
            ["title" => "文章管理", "permission" => "Modules\Article\Http\Controllers\ArticleController@index", "url" => "/article/article"],
        ],
    ],
];
