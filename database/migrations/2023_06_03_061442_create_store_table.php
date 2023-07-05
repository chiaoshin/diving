<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->id('store_id')->comment('店家編號');
            $table->string('ch_name', 50)->comment("店家名稱");
            $table->string('en_name', 100)->comment("店家名稱(英)");
            $table->string('address', 100)->comment("地址");
            $table->string('url')->comment("連結");
            $table->time('work_start_from')->nullable()->comment('營業時間(起)');
            $table->time('work_end_to')->nullable()->comment("營業時間(迄)");
            $table->time('checkin_start_from')->nullable()->comment('入住時間(起)');
            $table->time('checkin_end_to')->nullable()->comment("入住時間(迄)");
            $table->time('checkout_start_from')->nullable()->comment('退房時間(起)');
            $table->time('checkout_end_to')->nullable()->comment("退房時間(迄)");
            $table->text('transform_note')->nullable()->comment("交通建議");
            $table->text('landscape')->nullable()->comment("周遭景點");

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
        Schema::dropIfExists('store');
    }
}
