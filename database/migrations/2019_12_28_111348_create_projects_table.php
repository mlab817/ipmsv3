<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable()->unique();
            $table->string("pipol_url")->nullable();
            $table->string("pipol_code")->nullable();
            $table->boolean("pip")->default(0);
            $table->boolean("cip")->default(0);
            $table->boolean("trip")->default(0);
            $table->boolean("afmip")->default(0);
            $table->boolean("rdip")->default(0);
            $table->boolean("pcip")->default(0);
            $table->text("title");
            $table->unsignedBigInteger("type_id")->nullable();
            $table->unsignedBigInteger("operating_unit_id")->nullable();
            $table->unsignedBigInteger('main_funding_source_id')->nullable();
            $table->unsignedBigInteger('funding_institution_id')->nullable();
            $table->unsignedBigInteger("implementation_mode_id")->nullable();
            $table->unsignedBigInteger("priority_ranking")->nullable();
            $table->unsignedBigInteger("project_status_id")->nullable();
            $table->boolean("infrastructure")->default(0);
            $table->unsignedBigInteger("typology_id")->nullable();
            $table->unsignedBigInteger("tier_id")->nullable();
            $table->unsignedBigInteger("spatial_coverage_id")->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('city_municipality_id')->nullable();
            $table->text("cities_municipalities")->nullable();
            $table->text("description")->nullable();
            $table->text('components')->nullable();
            $table->text("goals")->nullable();
            $table->text('outcomes')->nullable();
            $table->text("purpose")->nullable();
            $table->text("expected_outputs")->nullable();
            $table->text("beneficiaries")->nullable();
            $table->text("employment_generated")->nullable();
            $table->bigInteger("target_start_year")->nullable();
            $table->bigInteger("target_end_year")->nullable();
            $table->date("implementation_start_date")->nullable();
            $table->date("implementation_end_date")->nullable();
            $table->decimal("total_project_cost",14,2)->default(0);
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->boolean('clearinghouse')->default(0);
            $table->date('clearinghouse_date')->nullable();
            // from table cip_processing
            $table->boolean('has_row')->default(0);
            $table->boolean('has_rap')->default(0);
            $table->boolean('has_fs')->default(0);
            $table->boolean('rdc_endorsed')->default(0);
            $table->date('rdc_endorsed_date')->nullable();
            $table->boolean('neda_submission')->default(0);
            $table->date('neda_submission_date')->nullable();
            $table->boolean('neda_secretariat_review')->default(0);
            $table->date('neda_secretariat_review_date')->nullable();
            $table->boolean('icc_endorsed')->default(0);
            $table->date('icc_endorsed_date')->nullable();
            $table->boolean('icc_approved')->default(0);
            $table->date('icc_approved_date')->nullable();
            $table->boolean('neda_board')->default(0);
            $table->date('neda_board_date')->nullable();
            $table->decimal('fs_target_2017',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2018',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2019',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2020',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2021',14,2)->nullable()->default(0);
            $table->decimal('fs_target_2022',14,2)->nullable()->default(0);
            $table->decimal('fs_target_total',14,2)->nullable()->default(0);
            // $table->text("status_update")->nullable(); // converted to one-to-many to accommodate multiple status updates
            // $table->unsignedBigInteger("readiness_id")->nullable();
            $table->text("updates")->nullable();
            $table->date("updates_date")->nullable();
            $table->text("implementation_risk")->nullable();
            $table->text("mitigation_strategy")->nullable();
            $table->text("income_increase")->nullable();
            $table->unsignedBigInteger("gad_score")->nullable();
            $table->unsignedBigInteger('gad_id')->nullable();
            $table->text('gad_checklist')->nullable();
            $table->decimal('row_target_2017',14,2)->nullable()->default(0);
            $table->decimal('row_target_2018',14,2)->nullable()->default(0);
            $table->decimal('row_target_2019',14,2)->nullable()->default(0);
            $table->decimal('row_target_2020',14,2)->nullable()->default(0);
            $table->decimal('row_target_2021',14,2)->nullable()->default(0);
            $table->decimal('row_target_2022',14,2)->nullable()->default(0);
            $table->decimal('row_target_total',14,2)->nullable()->default(0);
            $table->unsignedBigInteger('row_affected_2017')->nullable();
            $table->unsignedBigInteger('row_affected_2018')->nullable();
            $table->unsignedBigInteger('row_affected_2019')->nullable();
            $table->unsignedBigInteger('row_affected_2020')->nullable();
            $table->unsignedBigInteger('row_affected_2021')->nullable();
            $table->unsignedBigInteger('row_affected_2022')->nullable();
            $table->decimal('rap_target_2017',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2018',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2019',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2020',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2021',14,2)->nullable()->default(0);
            $table->decimal('rap_target_2022',14,2)->nullable()->default(0);
            $table->decimal('rap_target_total',14,2)->nullable()->default(0);
            $table->unsignedBigInteger('rap_affected_2017')->nullable();
            $table->unsignedBigInteger('rap_affected_2018')->nullable();
            $table->unsignedBigInteger('rap_affected_2019')->nullable();
            $table->unsignedBigInteger('rap_affected_2020')->nullable();
            $table->unsignedBigInteger('rap_affected_2021')->nullable();
            $table->unsignedBigInteger('rap_affected_2022')->nullable();
            $table->string("estimated_project_life")->nullable();
            $table->decimal("financial_benefit_cost_ratio",14,2)->nullable()->default(0);
            $table->decimal("financial_internal_rate_return",14,2)->nullable()->default(0);
            $table->decimal("financial_net_present_value",14,2)->nullable()->default(0);
            $table->decimal("economic_benefit_cost_ratio",14,2)->nullable()->default(0);
            $table->decimal("economic_internal_rate_return",14,2)->nullable()->default(0);
            $table->decimal("economic_net_present_value",14,2)->nullable()->default(0);
            $table->decimal('investment_target_2016',14,2)->nullable()->default(0);
            $table->decimal('investment_target_2017',14,2)->nullable()->default(0);
            $table->decimal('investment_target_2018',14,2)->nullable()->default(0);
            $table->decimal('investment_target_2019',14,2)->nullable()->default(0);
            $table->decimal('investment_target_2020',14,2)->nullable()->default(0);
            $table->decimal('investment_target_2021',14,2)->nullable()->default(0);
            $table->decimal('investment_target_2022',14,2)->nullable()->default(0);
            $table->decimal('investment_target_2023',14,2)->nullable()->default(0);
            $table->decimal('investment_target_total',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2016',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2017',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2018',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2019',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2020',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2021',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2022',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_2023',14,2)->nullable()->default(0);
            $table->decimal('infrastructure_target_total',14,2)->nullable()->default(0);
            $table->decimal('nep_2016',14,2)->nullable()->default(0);
            $table->decimal('nep_2017',14,2)->nullable()->default(0);
            $table->decimal('nep_2018',14,2)->nullable()->default(0);
            $table->decimal('nep_2019',14,2)->nullable()->default(0);
            $table->decimal('nep_2020',14,2)->nullable()->default(0);
            $table->decimal('nep_2021',14,2)->nullable()->default(0);
            $table->decimal('nep_2022',14,2)->nullable()->default(0);
            $table->decimal('nep_2023',14,2)->nullable()->default(0);
            $table->decimal('nep_total',14,2)->nullable()->default(0);
            $table->decimal('gaa_2016',14,2)->nullable()->default(0);
            $table->decimal('gaa_2017',14,2)->nullable()->default(0);
            $table->decimal('gaa_2018',14,2)->nullable()->default(0);
            $table->decimal('gaa_2019',14,2)->nullable()->default(0);
            $table->decimal('gaa_2020',14,2)->nullable()->default(0);
            $table->decimal('gaa_2021',14,2)->nullable()->default(0);
            $table->decimal('gaa_2022',14,2)->nullable()->default(0);
            $table->decimal('gaa_2023',14,2)->nullable()->default(0);
            $table->decimal('gaa_total',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2016',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2017',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2018',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2019',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2020',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2021',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2022',14,2)->nullable()->default(0);
            $table->decimal('disbursement_2023',14,2)->nullable()->default(0);
            $table->decimal('disbursement_total',14,2)->nullable()->default(0);
            $table->text('image_url')->nullable();

            // $table->unsignedBigInteger('submission_status_id')->default(1);
            $table->unsignedBigInteger("created_by")->nullable();
            $table->unsignedBigInteger("updated_by")->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('finalized_by')->nullable();
            $table->timestamp('finalized_at')->nullable();
            $table->unsignedBigInteger('endorsed_by')->nullable();
            $table->timestamp('endorsed_at')->nullable();
            $table->unsignedBigInteger('endorsement_id')->nullable();
//            $table->unsignedBigInteger('validated_by')->nullable();
//            $table->timestamp('validated_at')->nullable();
//            $table->unsignedBigInteger('returned_by')->nullable();
//            $table->timestamp('returned_at')->nullable();
//            $table->unsignedBigInteger("reviewed_by")->nullable();
//            $table->timestamp("reviewed_at")->nullable();
//            $table->unsignedBigInteger("accepted_by")->nullable();
//            $table->timestamp("accepted_at")->nullable();
//            $table->unsignedBigInteger("approved_by")->nullable();
//            $table->timestamp("approved_at")->nullable();
//            $table->unsignedBigInteger("encoded_by")->nullable();
//            $table->timestamp("encoded_at")->nullable();
            $table->unsignedBigInteger("deleted_by")->nullable();
            $table->softDeletes();

            $table->foreign('operating_unit_id')->references('id')->on('operating_units')->onDelete('set null');
            $table->foreign('main_funding_source_id')->references('id')->on('funding_sources')->onDelete('set null');
            $table->foreign('funding_institution_id')->references('id')->on('funding_institutions')->onDelete('set null');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->foreign('tier_id')->references('id')->on('tiers')->onDelete('set null');
            $table->foreign('gad_id')->references('id')->on('gads')->onDelete('set null');
            $table->foreign('spatial_coverage_id')->references('id')->on('spatial_coverages')->onDelete('set null');
            $table->foreign('implementation_mode_id')->references('id')->on('implementation_modes')->onDelete('set null');
            // $table->foreign('submission_status_id')->references('id')->on('submission_statuses');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('endorsed_by')->references('id')->on('users')->onDelete('set null');
//            $table->foreign('returned_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
//            $table->foreign('reviewed_by')->references('id')->on('users');
//            $table->foreign('accepted_by')->references('id')->on('users');
//            $table->foreign('finalized_by')->references('id')->on('users');
//            $table->foreign('validated_by')->references('id')->on('users');
            $table->foreign('endorsement_id')->references('id')->on('endorsements')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}