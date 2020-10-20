<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatingUnitPrexcActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_unit_prexc_activity', function (Blueprint $table) {
            $table->unsignedBigInteger('operating_unit_id');
            $table->unsignedBigInteger('prexc_activity_id');
            $table->decimal('target_2016',14,2)->nullable()->default(0);
            $table->decimal('target_2017',14,2)->nullable()->default(0);
            $table->decimal('target_2018',14,2)->nullable()->default(0);
            $table->decimal('target_2019',14,2)->nullable()->default(0);
            $table->decimal('target_2020',14,2)->nullable()->default(0);
            $table->decimal('target_2021',14,2)->nullable()->default(0);
            $table->decimal('target_2022',14,2)->nullable()->default(0);
            $table->decimal('target_2023',14,2)->nullable()->default(0);
            $table->decimal('target_total',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2016',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2017',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2018',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2019',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2020',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2021',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2022',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2023',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_total',14,2)->nullable()->default(0);
            $table->timestamps();

            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('cascade');
            $table->foreign('prexc_activity_id')->references('id')->on('prexc_activities')->onDelete('cascade');
            $table->unique(['operating_unit_id','prexc_activity_id'], 'ou_pa_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operating_unit_prexc_activity');
    }
}
