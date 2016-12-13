<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('上传者');
            $table->string('category')->comment('文件分类');
            $table->string('storage')->comment('文件存储器类型,如local, oss');
            $table->string('path')->comment('文件路径');
            $table->string('origin_name')->comment('文件原名');
            $table->string('file_name')->comment('文件当前名');
            $table->string('mimetype')->comment('文件mimetype');
            $table->string('file_type')->comment('文件类型');
            $table->string('file_size')->comment('文件类型');
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
        Schema::drop('media');
    }
}
