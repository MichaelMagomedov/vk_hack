<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnswerRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->integer('rate')->default(0);
        });
        Schema::table('test_results', function (Blueprint $table) {
            $table->integer('from')->default(0);
            $table->integer('to')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('rate')->default(0);
        });
        Schema::table('test_results', function (Blueprint $table) {
            $table->dropColumn('from')->default(0);
            $table->dropColumn('to')->default(0);
        });
    }
}
