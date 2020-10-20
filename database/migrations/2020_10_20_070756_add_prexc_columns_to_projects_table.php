<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrexcColumnsToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('prexc_program_id')->nullable();
            $table->unsignedBigInteger('prexc_subprogram_id')->nullable();
            $table->unsignedBigInteger('prexc_activity_id')->nullable();

            $table->foreign('prexc_program_id')->references('id')->on('prexc_programs')->onDelete('set null');
            $table->foreign('prexc_subprogram_id')->references('id')->on('prexc_subprograms')->onDelete('set null');
            $table->foreign('prexc_activity_id')->references('id')->on('prexc_activities')->onDelete('set null');
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
            $table->dropIfExists('prexc_program_id');
            $table->dropIfExists('prexc_subprogram_id');
            $table->dropIfExists('prexc_activity_id');
        });
    }
}
