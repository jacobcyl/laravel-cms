<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTranlationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tranlations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->index()->comment('文章对应ID');
            $table->string('locale')->index()->comment('语言种类');
            $table->string('title')->comment('标题');
            $table->text('content')->comment('文章内容');
            $table->integer('user_id')->unsigned()->index()->comment('创建者ID');
            $table->string('author')->comment('作者');
            $table->string('digest')->comment('摘要');
            $table->string('source_url')->comment('原文地址');
            $table->timestamps();

            $table->unique(['post_id','locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_tranlations');
    }
}
