<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_financials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('region_id');
            $table->decimal('target_2016',14,2)->default(0)->nullable();
            $table->decimal('target_2017',14,2)->default(0)->nullable();
            $table->decimal('target_2018',14,2)->default(0)->nullable();
            $table->decimal('target_2019',14,2)->default(0)->nullable();
            $table->decimal('target_2020',14,2)->default(0)->nullable();
            $table->decimal('target_2021',14,2)->default(0)->nullable();
            $table->decimal('target_2022',14,2)->default(0)->nullable();
            $table->decimal('target_2023',14,2)->default(0)->nullable();
            $table->decimal('target_total',14,2)->default(0)->nullable();
            $table->timestamps();
              
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region_financials');
    }
}
