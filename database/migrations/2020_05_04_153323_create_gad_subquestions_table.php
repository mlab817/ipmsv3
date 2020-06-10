<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGadSubquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gad_subquestions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->unsignedBigInteger('gad_question_id');
            $table->timestamps();

            $table->foreign('gad_question_id')->references('id')->on('gad_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gad_subquestions');
    }
}
