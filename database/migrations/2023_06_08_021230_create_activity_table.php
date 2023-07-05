<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->id('activity_id')->comment('活動項目編號');
            $table->string('ch_name', 50)->comment("店家名稱");
            $table->string('en_name', 100)->comment("店家名稱(英)");
            $table->string('address', 100)->comment("地址");
            $table->string('url')->comment("連結");
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
        Schema::dropIfExists('activity');
    }
}
