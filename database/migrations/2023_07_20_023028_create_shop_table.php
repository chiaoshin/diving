<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->id('shop_id')->comment('店家編號');
            $table->string('ch_name', 50)->comment("店家名稱");
            $table->string('en_name', 100)->nullable()->comment("店家名稱(英)");
            $table->string('address', 100)->comment("地址");
            $table->string('url')->comment("連結");
            $table->time('work_start_from')->nullable()->comment('營業時間(起)');
            $table->time('work_end_to')->nullable()->comment("營業時間(迄)");
            $table->text('transform_note')->nullable()->comment("交通建議");
            $table->string('area')->comment('地區');
            $table->string('location')->comment('縣市');
            $table->double('lat')->comment("緯度");
            $table->double('lng')->comment("經度");
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
        Schema::dropIfExists('shop');
    }
}
