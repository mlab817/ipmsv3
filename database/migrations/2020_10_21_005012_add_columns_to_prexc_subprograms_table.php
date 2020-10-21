<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPrexcSubprogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prexc_subprograms', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('organizational_outcome')->nullable();
            $table->text('objective_statement')->nullable();
            $table->text('program_strategy')->nullable();
            $table->text('outcome_indicators')->nullable();
            $table->text('output_indicators')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prexc_subprograms', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('organizational_outcome');
            $table->dropColumn('objective_statement');
            $table->dropColumn('program_strategy');
            $table->dropColumn('outcome_indicators');
            $table->dropColumn('output_indicators');
        });
    }
}
