<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEndorsedColumnToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('endorsed')->nullable()->default(false);
            $table->boolean('reviewed')->nullable()->default(false);
            $table->boolean('approved')->nullable()->default(false);
            $table->boolean('encoded')->nullable()->default(false);
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
            $table->dropColumn('endorsed');
            $table->dropColumn('reviewed');
            $table->dropColumn('approved');
            $table->dropColumn('encoded');
        });
    }
}
