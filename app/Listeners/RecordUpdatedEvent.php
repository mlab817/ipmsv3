<?php

namespace App\Listeners;

use Log;
use App\Models\Project;
use App\Models\ProcessingStatus;
use App\Models\ProjectProcessingStatus;
use App\Events\ProjectUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordUpdatedEvent
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
     * @param  ProjectUpdatedEvent  $event
     * @return void
     */
    public function handle(ProjectUpdatedEvent $event)
    {
        $processing_status = ProcessingStatus::where('name','updated')->first();

        Log::info(json_encode($event));

        $project = Project::find($event->project->id);
        $project->processing_status_id = $processing_status->id;
        $project->save();

        ProjectProcessingStatus::create([
            'project_id' => $event->project->id,
            'processing_status_id' => $processing_status->id,
            'processed_by' => $event->project->processed_by,
            'remarks' => 'Project Updated'
        ]);
    }
}
