<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->comment('文章編號');
            $table->integer('user_id')->comment('用戶編號');
            $table->integer('parent_id')->nullable()->comment('上一層留言編號');
            $table->integer('level')->nullable()->default(1)->comment('留言階層');
            $table->text('content')->comment('內容');
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
        Schema::dropIfExists('comment');
    }
}
