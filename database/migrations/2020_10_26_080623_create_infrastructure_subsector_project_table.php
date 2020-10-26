<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrastructureSubsectorProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastructure_subsector_project', function (Blueprint $table) {
            $table->unsignedBigInteger('infrastructure_subsector_id');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('infrastructure_subsector_id')->references('id')->on('infrastructure_subsectors')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->unique(['infrastructure_subsector_id','project_id'],'isp_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infrastructure_subsector_project');
    }
}
