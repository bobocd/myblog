<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_news', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('data')->comment('图文内容|textarea');
            $table->integer('rule_id')->comment('规则编号|input');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wx_news');
    }
}
