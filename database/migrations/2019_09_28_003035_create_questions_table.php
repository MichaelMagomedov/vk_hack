<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text');

            $table->string('type');
            $table->string('img')->nullable();

            $table->bigInteger('test_id')->nullable();
            $table->bigInteger('parent_id')->nullable();

            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
