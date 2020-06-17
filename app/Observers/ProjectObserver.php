<?php

namespace App\Observers;

use Illuminate\Str;
use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Notifications\ProjectCreated;
use App\Notifications\ProjectDeleted;
use App\User;

class ProjectObserver
{
    public function creating(Project $project)
    {
        // Do nothing
    }

    public function created(Project $project)
    {
      // set processing status id to 'draft'
      $project->processing_status_id = 1;

      $uuid = Str::uuid();

      $project->uuid = $uuid;
    }

    public function updating(Project $project)
    {
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
