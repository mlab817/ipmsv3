<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumnsToOperatingUnitPrexcActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operating_unit_prexc_activity', function (Blueprint $table) {
          $table->decimal('gaa_2016',14,2)->default(0)->nullable();
          $table->decimal('gaa_2017',14,2)->default(0)->nullable();
          $table->decimal('gaa_2018',14,2)->default(0)->nullable();
          $table->decimal('gaa_2019',14,2)->default(0)->nullable();
          $table->decimal('gaa_2020',14,2)->default(0)->nullable();
          $table->decimal('gaa_2021',14,2)->default(0)->nullable();
          $table->decimal('gaa_2022',14,2)->default(0)->nullable();
          $table->decimal('gaa_2023',14,2)->default(0)->nullable();
          $table->decimal('gaa_total',14,2)->default(0)->nullable();
          $table->decimal('nep_2016',14,2)->default(0)->nullable();
          $table->decimal('nep_2017',14,2)->default(0)->nullable();
          $table->decimal('nep_2018',14,2)->default(0)->nullable();
          $table->decimal('nep_2019',14,2)->default(0)->nullable();
          $table->decimal('nep_2020',14,2)->default(0)->nullable();
          $table->decimal('nep_2021',14,2)->default(0)->nullable();
          $table->decimal('nep_2022',14,2)->default(0)->nullable();
          $table->decimal('nep_2023',14,2)->default(0)->nullable();
          $table->decimal('nep_total',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2016',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2017',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2018',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2019',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2020',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2021',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2022',14,2)->default(0)->nullable();
          $table->decimal('disbursement_2023',14,2)->default(0)->nullable();
          $table->decimal('disbursement_total',14,2)->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operating_unit_prexc_activity', function (Blueprint $table) {
            //
        });
    }
}
