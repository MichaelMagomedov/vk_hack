<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');
            $table->bigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');;
            $table->bigInteger('next_question_id')->nullable();
            $table->foreign('next_question_id')->references('id')->on('questions')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
