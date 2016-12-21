<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->unsigned()->comment('父类id');
            //NestedSet::columns($table);
$table->unsignedInteger('_lft');
$table->unsignedInteger('_rgt');
            $table->string('cate_type')->comment('分类类别');
            $table->string('name')->comment('分类名称');
            $table->string('slug')->comment('别名');
            $table->integer('sort')->comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
