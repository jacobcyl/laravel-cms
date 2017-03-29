<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned()->index()->comment('员工对应ID');
            $table->string('locale')->index()->comment('语言种类');
            $table->string('title')->comment('标题');
            $table->text('description')->comment('描述内容');
            $table->timestamps();

            $table->unique(['staff_id','locale']);
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff_translations');
    }
}
