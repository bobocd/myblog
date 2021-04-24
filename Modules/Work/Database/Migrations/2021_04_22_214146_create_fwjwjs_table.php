<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFwjwjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fwjwjs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('工单主题');
            $table->string('emphasis')->comment('工单重点');
            $table->string('phone')->comment('客户号码');
            $table->string('belong_name')->comment('区县');
            $table->string('area_name')->comment('分局');
            $table->string('group_name')->comment('网格');
            $table->string('grade')->comment('紧急程度');
            $table->string('largeclass')->comment('大类目录');
            $table->string('subclass')->comment('小类目录');
            $table->string('kd_address')->comment('宽带地址');
            $table->string('cust_address')->comment('常客地址');
            $table->string('cust_portrayal')->comment('客户画像');
            $table->string('description')->comment('描述说明');
            $table->string('status')->comment('状态');
            $table->string('user_id')->comment('发起人');
            $table->string('deal_user_id')->nullable()->comment('处理人');
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
        Schema::dropIfExists('fwjwjs');
    }
}
