<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->integer('parent_id')->after('id')->unsigned()->comment('楼主');
            $table->enum('status', ['unread', 'read'])->default('unread')->after('valid')->comment('阅读状态');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('status');
        });
    }
}
