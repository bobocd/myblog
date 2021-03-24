<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题|input');
            $table->string('author')->nullable()->comment('作者|input');
            $table->text('digest')->comment('文章摘要|simditor');
            $table->text('content')->comment('内容|simditor');
            $table->string('thumb')->nullable()->comment('缩略图|image');
            $table->integer('click')->default(0)->comment('查看次数|input');
            $table->unsignedInteger('category_id')->comment('栏目');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');//外键约束
            $table->tinyInteger('iscommend')->default(1)->comment('推荐|radio|1:是,0:否');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
