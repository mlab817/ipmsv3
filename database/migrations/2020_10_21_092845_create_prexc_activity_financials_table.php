<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrexcActivityFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prexc_activity_financials', function (Blueprint $table) {
            $table->id();
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
            $table->decimal('target_2024',14,2)->nullable()->default(0);
            $table->decimal('target_2025',14,2)->nullable()->default(0);
            $table->decimal('target_total',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2016',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2017',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2018',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2019',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2020',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2021',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2022',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2023',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2024',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2025',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_total',14,2)->nullable()->default(0);
            $table->decimal('gaa_2016',14,2)->default(0)->nullable();
            $table->decimal('gaa_2017',14,2)->default(0)->nullable();
            $table->decimal('gaa_2018',14,2)->default(0)->nullable();
            $table->decimal('gaa_2019',14,2)->default(0)->nullable();
            $table->decimal('gaa_2020',14,2)->default(0)->nullable();
            $table->decimal('gaa_2021',14,2)->default(0)->nullable();
            $table->decimal('gaa_2022',14,2)->default(0)->nullable();
            $table->decimal('gaa_2023',14,2)->default(0)->nullable();
            $table->decimal('gaa_2024',14,2)->default(0)->nullable();
            $table->decimal('gaa_2025',14,2)->default(0)->nullable();
            $table->decimal('gaa_total',14,2)->default(0)->nullable();
            $table->decimal('nep_2016',14,2)->default(0)->nullable();
            $table->decimal('nep_2017',14,2)->default(0)->nullable();
            $table->decimal('nep_2018',14,2)->default(0)->nullable();
            $table->decimal('nep_2019',14,2)->default(0)->nullable();
            $table->decimal('nep_2020',14,2)->default(0)->nullable();
            $table->decimal('nep_2021',14,2)->default(0)->nullable();
            $table->decimal('nep_2022',14,2)->default(0)->nullable();
            $table->decimal('nep_2023',14,2)->default(0)->nullable();
            $table->decimal('nep_2024',14,2)->default(0)->nullable();
            $table->decimal('nep_2025',14,2)->default(0)->nullable();
            $table->decimal('nep_total',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2016',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2017',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2018',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2019',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2020',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2021',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2022',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2023',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2024',14,2)->default(0)->nullable();
            $table->decimal('disbursement_2025',14,2)->default(0)->nullable();
            $table->decimal('disbursement_total',14,2)->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('cascade');
            $table->foreign('prexc_activity_id')->references('id')->on('prexc_activities')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('prexc_activity_financials');
    }
}
