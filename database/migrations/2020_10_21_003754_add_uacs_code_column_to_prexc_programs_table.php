<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUacsCodeColumnToPrexcProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prexc_programs', function (Blueprint $table) {
            $table->string('uacs_code')->nullable()->after('acronym');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prexc_programs', function (Blueprint $table) {
            $table->dropColumn('uacs_code');
        });
    }
}
