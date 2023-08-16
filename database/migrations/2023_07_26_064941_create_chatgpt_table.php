<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatgptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatgpt', function (Blueprint $table) {
            $table->id('chatgpt_id')->comment('ChatGPT編號');
            $table->string('keyword')->comment("關鍵字");
            $table->text('respond')->comment("回應");
            $table->string('preview_img_url')->nullable()->comment('預覽圖路徑');
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
        Schema::dropIfExists('chatgpt');
    }
}
