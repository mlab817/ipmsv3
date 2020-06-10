<?php

namespace App\Observers;

use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Notifications\ProjectCreated;
use App\Notifications\ProjectDeleted;
use App\User;

class ProjectObserver
{
    public function creating(Project $project)
    {
      // do nothing
      // $user = auth()->user();

      // if (! $user) {
      //   $project->created_by = 1;
      // }
      // else {
      //   $project->created_by = $user->id;
      // }
    }

    public function created(Project $project)
    {
      // set processing status id to 'draft'
      $project->processing_status_id = 1;
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
