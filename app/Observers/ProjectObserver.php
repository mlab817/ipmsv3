<?php

namespace App\Observers;

use App\Models\FundingSource;
use App\Models\Region;
use App\Models\PrexcActivity;
use App\Models\ProjectProcessingStatus;
use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Notifications\ProjectCreated;
use App\Notifications\ProjectDeleted;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectObserver
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function creating(Project $project)
    {
        $project->created_by = auth()->user()->id;
        $project->finalized = false;
    }

    public function created(Project $project)
    {
      // set processing status id to 'draft'
      $project->processing_status_id = 1;

      // create uuid
      $uuid = Str::uuid();

      $project->uuid = $uuid;

      $project->slug = Str::slug($project->title . '-' . $project->id);

      // create prexc activity based on project
      PrexcActivity::create([
        'name' => $project->title,
        'operating_unit_id' => $project->operating_unit_id,
        'prexc_program_id' => $project->prexc_program_id,
        'prexc_subprogram_id' => $project->prexc_subprogram_id,
        'uacs_code' => $project->uacs_code,
      ]);
    }

    public function updating(Project $project)
    {
      $project->increment('version');

      // if project is finalized set processing status id to finalized
      if ($this->request['finalized']) {
        $processing_status = ProcessingStatus::where('name','finalized')->first();
        $project->processing_status_id = $processing_status->id;
      }

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

    public function finalized(Project $project)
    {
        $project->finalized = true;
    }

    public function endorsed(Project $project)
    {
        $project->endorsed = true;

        ProjectProcessingStatus::create([
            'project_id' => $project->id,
            'processing_status_id' => $project->processing_status->id,
            'processed_by' => auth()->id,
            'remarks' => null
        ]);
    }

    public function reviewed(Project $project)
    {
        $project->reviewed = true;
    }
}
