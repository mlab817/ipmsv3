<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIcColumnsToProjectRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_region', function (Blueprint $table) {
            $table->decimal('infrastructure_target_2016',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2017',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2018',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2019',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2020',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2021',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2022',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_2023',14,2)->default(0)->nullable();
            $table->decimal('infrastructure_target_total',14,2)->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_region', function (Blueprint $table) {
            //
        });
    }
}
