<?php

namespace Modules\Wx\Entities;

use Illuminate\Database\Eloquent\Model;

class WxMenu extends Model
{
    protected $fillable = ['name','data','status'];
}
