<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题|input');
            $table->string('url')->comment('链接|input');
            $table->string('thumb')->comment('图片|image');
            $table->integer('click')->comment('查看次数|input');
            $table->tinyInteger('enable')->default(1)->comment('状态|radio|1:开启,0:关闭');
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
        Schema::dropIfExists('slides');
    }
}
