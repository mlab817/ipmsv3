<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProcessingStatusIdColumnToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('processing_status_id')->nullable()->default(1);
            $table->unsignedBigInteger('processed_by')->nullable();

            $table->foreign('processing_status_id')->references('id')->on('processing_statuses')->onDelete('SET NULL');
            $table->foreign('processed_by')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('processing_status_id');
            $table->dropColumn('processed_by');
        });
    }
}
