<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('answer_id')->nullable();
            $table->bigInteger('client_id')->nullable();
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_answers');
    }
}
