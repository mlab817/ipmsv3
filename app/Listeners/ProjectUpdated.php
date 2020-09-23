<?php

namespace App\Listeners;

use Log;
use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProjectUpdated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Log::info(json_encode($event));

        $processing_status = ProcessingStatus::where('name','updated')->first();

        $project = Project::find($event->project->id);
        // $project->processing_status_id = $processing_status->id;
        // $project->save();

        // update version
        // $project->increment('version');

        ProjectProcessingStatus::create([
            'project_id' => $project->id,
            'processing_status_id' => $processing_status->id,
            'processed_by' => $event->user->id,
            'remarks' => 'Project updated'
        ]);
    }
}
