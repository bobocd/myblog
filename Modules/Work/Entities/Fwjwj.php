<?php

namespace Modules\Work\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Fwjwj extends Model
{
    protected $fillable = ['title','emphasis','phone','belong_name','area_name','group_name','grade','largeclass','subclass','kd_address','cust_address','cust_portrayal',
        'description','status','user_id','deal_user_id'];

    //关联创建人
    public function author(){
        return  $this->belongsTo(User::class,'user_id','id');
    }

    //关联处理人
    public function deal_user(){
        return $this->belongsTo(User::class,'deal_user_id','id');
    }
}
