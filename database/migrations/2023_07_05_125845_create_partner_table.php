<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner', function (Blueprint $table) {
            $table->id('partner_id')->comment('夥伴編號');
            $table->string('name')->comment('使用者名稱');
            $table->date('group_time')->comment("出團日");
            $table->string('location')->comment("地點");
            $table->integer('money')->comment("金額");
            $table->string('email')->comment("電子信箱");
            $table->string('type', 10)->comment("潛水類型");
            $table->string('license', 5)->nullable()->comment("有無考照");
            $table->integer('people_limit')->default(20)->comment("人數限制");
            $table->integer('people_number')->comment("目前人數");
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
        Schema::dropIfExists('partner');
    }
}
