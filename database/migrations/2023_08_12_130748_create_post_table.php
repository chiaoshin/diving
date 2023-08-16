<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('作者編號');
            $table->string('title')->comment('文章標題');
            $table->text('content')->comment('文章內容');
            $table->string('preview_img_url')->nullable()->comment('預覽圖路徑');
            $table->integer('reviews')->nullable()->default(0)->comment('回覆數量');
            $table->integer('like')->nullable()->default(0)->comment('按讚數量');
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
        Schema::dropIfExists('post');
    }
}
