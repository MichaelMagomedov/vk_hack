<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->bigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('test_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->string('category')->nullable();
        });
        Schema::dropIfExists('test_categories');;
    }
}
