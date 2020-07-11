<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectFundingSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_funding_source', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('funding_source_id');
            $table->decimal('target_2016',14,2)->default(0)->nullable();
            $table->decimal('target_2017',14,2)->default(0)->nullable();
            $table->decimal('target_2018',14,2)->default(0)->nullable();
            $table->decimal('target_2019',14,2)->default(0)->nullable();
            $table->decimal('target_2020',14,2)->default(0)->nullable();
            $table->decimal('target_2021',14,2)->default(0)->nullable();
            $table->decimal('target_2022',14,2)->default(0)->nullable();
            $table->decimal('target_2023',14,2)->default(0)->nullable();
            $table->decimal('target_total',14,2)->default(0)->nullable();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('funding_source_id')->references('id')->on('funding_sources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_funding_source');
    }
}
