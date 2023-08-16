<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('law', function (Blueprint $table) {
            $table->id('law_id')->comment('判決書編號');
            $table->integer('store_id')->nullable()->comment('店家編號');
            $table->integer('shop_id')->nullable()->comment('用品店編號');
            $table->integer('hotel_id')->nullable()->comment('背包客房編號');
            $table->string('business_id')->comment('統一編號');
            $table->string('ch_name', 50)->comment("店家名稱");
            // $table->string('en_name', 100)->nullable()->comment("店家名稱(英)");
            // $table->string('area')->comment('地區');
            // $table->string('location')->comment('縣市');
            // $table->string('address', 100)->comment("地址");
            $table->string('event')->comment("事件");
            $table->string('url')->comment("連結");
            $table->text('directions')->nullable()->comment("說明");
            $table->string('type')->comment("類型");

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
        Schema::dropIfExists('law');
    }
}
