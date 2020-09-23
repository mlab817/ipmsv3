<?php

namespace App\Observers;

use App\Models\FundingSource;
use App\Models\Region;
use App\Models\ProjectProcessingStatus;
use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Notifications\ProjectCreated;
use App\Notifications\ProjectDeleted;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProjectObserver
{
    public function creating(Project $project)
    {
        $project->processed_by = auth()->user()->id;
        $project->finalized = false;
    }

    public function created(Project $project)
    {
      // create placeholder for regions
      $regions = Region::all()->pluck('id');

      $project->regions()->attach($regions);

      // create placeholder for funding_sources
      $fs = FundingSource::all()->pluck('id');

      $project->funding_sources()->attach($fs);

      // set processing status id to 'draft'
      $project->processing_status_id = 1;

      $uuid = Str::uuid();

      $project->uuid = $uuid;

      // ProjectProcessingStatus::create([
      //     'project_id' => $project->id,
      //     'processing_status_id' => 1,
      //     'processed_by' => $project->created_by,
      //     'remarks' => 'new project',
      //     'processed_at' => Carbon::now()
      // ]);
    }

    public function updating(Project $project)
    {
      $project->increments('version');
      $project->updated_by = auth()->user()->id;
    }

    public function deleting(Project $project)
    {
      $project->deleted_by = auth()->user()->id;
    }

    public function forceDeleting(Project $project)
    {
      // In case you want to write some information on who permanently deleted a model.
    }
}
