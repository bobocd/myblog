<?php
namespace App\Handlers;

class TemplatePathHandler{
    /**
     * 获取模块、控制器、方法
     */
    final public function getTemplatePath()
    {
        $arr=[];
        list($class, $method) = explode('@', request()->route()->getActionName());

        //方法名
        $arr['method']=$method;
        // 控制器名称
        $arr['controller']=str_replace('Controller', '', substr(strrchr($class, '\\'), 1));

        // 模块名
        $arr['module'] = str_replace(
            '\\',
            '.',
            str_replace(
                'App\\Http\\Controllers\\',
                '',
                trim(
                    implode('\\', array_slice(explode('\\', $class), 0, -1)),
                    '\\'
                )
            )
        );
        return $arr;
    }
}
