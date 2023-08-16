<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map', function (Blueprint $table) {
            $table->id('map_id')->comment('地點編號');
            $table->string('ch_name')->comment("地點 Ex.潛點");
            $table->string('area')->comment("地區 Ex.小琉球");
            $table->string('location')->comment("縣市 Ex.琉球鄉");
            $table->string('address')->comment("地址");
            $table->double('lat')->comment("緯度");
            $table->double('lng')->comment("經度");
            $table->text('description')->nullable()->comment("文字敘述");

            $table->double('star_rating')->nullable()->comment("星級");
            $table->double('reviews')->nullable()->comment("評論數量");
            $table->text('AI_reviews')->nullable()->comment("AI評論");
            $table->text('reviews_url')->nullable()->comment("評論連結");

            $table->string('preview_img_url')->nullable()->comment('潛點預覽圖路徑');
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
        Schema::dropIfExists('map');
    }
}
