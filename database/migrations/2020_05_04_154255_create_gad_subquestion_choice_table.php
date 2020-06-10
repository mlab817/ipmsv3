<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGadSubquestionChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gad_subquestion_choice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gad_subquestion_id');
            $table->unsignedBigInteger('gad_choice_id');
            $table->timestamps();

            $table->foreign('gad_subquestion_id')->references('id')->on('gad_subquestions')->onDelete('cascade');
            $table->foreign('gad_choice_id')->references('id')->on('gad_choices')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gad_subquestion_choice');
    }
}
