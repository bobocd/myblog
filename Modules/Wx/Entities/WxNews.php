<?php

namespace Modules\Wx\Entities;

use Illuminate\Database\Eloquent\Model;

class WxNews extends Model
{
    protected $table = 'wx_news';
    protected $fillable = ['data','rule_id'];

    public function rule(){
        return $this->belongsTo(WxRule::class,'rule_id');
    }
}
