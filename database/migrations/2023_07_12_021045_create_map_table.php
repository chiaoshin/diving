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
            $table->string('location')->comment("地點 Ex.潛點");
            $table->string('area')->comment("地區 Ex.小琉球");
            $table->string('address')->comment("地址");
            $table->double('lat')->comment("緯度");
            $table->double('lng')->comment("經度");
            $table->text('description')->nullable()->comment("文字敘述");
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
