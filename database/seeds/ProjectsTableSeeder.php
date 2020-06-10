<?php

use App\Models\Basis;
use App\Models\Paradigm;
use App\Models\Project;
use App\Models\Province;
use App\Models\Region;
use App\Models\SustainableDevelopmentGoal;
use App\Models\TechnicalReadiness;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create an instance of a project based on database/factories/ProjectFactory
         */
        factory(Project::class,10)->create()->each(function ($project) {
          $project->regions()->saveMany(Region::all()->random(2));
          $project->provinces()->saveMany(Province::all()->random(5));
          $project->paradigms()->saveMany(Paradigm::all()->random(2));
          $project->sustainable_development_goals()->saveMany(SustainableDevelopmentGoal::all()->random(2));
          $project->bases()->saveMany(Basis::all()->random(3));
          $project->technical_readinesses()->saveMany(TechnicalReadiness::all()->random(3));
          $project_processing_statuses = factory(App\Models\ProjectProcessingStatus::class,3)->make();
          $project->project_processing_statuses()->saveMany($project_processing_statuses);
        });
    }
}
