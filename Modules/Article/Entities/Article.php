<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','author','digest','content','thumb','click','category_id','iscommend'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
