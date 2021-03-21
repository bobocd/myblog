<?php

namespace Modules\Article\Entities;

use Houdunwang\Arr\Arr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','pid'];

    /**
     * @param 栏目分层分级显示
     * @return mixed
     */
    public function getAll($category=null)
    {
        $data = $this->get()->toArray();
        if (!is_null($category)) {
            foreach ($data as $k => $d) {
                $data[$k]['_selected'] = $category['pid'] == $d['id'];
                $data[$k]['_disabled'] = $category['id'] == $d['id'] || (new Arr())->isChild($data, $d['id'], $category['id'], 'id');
            }

        }
        $data = (new Arr())->tree($data, 'name', 'id');
        return $data;
    }
    /**
     * 是否有子栏目
     * @author Vance
     *
     * @return bool
     */
    public function hasChildCategory()
    {
        $data = $this->get()->toArray();
        return (new Arr())->hasChild($data, $this->id);
    }
}
