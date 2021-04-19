<?php

namespace Modules\Wx\Entities;

use Illuminate\Database\Eloquent\Model;

class WxReplyBase extends Model
{
    protected $fillable = ['wx_rule_id','content'];

    public function rule(){
        return $this->belongsTo(WxRule::class,'wx_rule_id');
    }

}
