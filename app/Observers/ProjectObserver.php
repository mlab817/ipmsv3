<?php

namespace App\Observers;

use Log;
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
      $prexc_activity = PrexcActivity::create([
        'name' => $project->title,
        'operating_unit_id' => $project->operating_unit_id,
        'prexc_program_id' => $project->prexc_program_id,
        'prexc_subprogram_id' => $project->prexc_subprogram_id,
        // 'uacs_code' => $project->uacs_code,
        'project_id' => $project->id
      ]);

      Log::debug(json_encode($prexc_activity));
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

    public function updated(Project $project) {
        // TODO: Update prexc_activity created here
        $prexc_activity = PrexcActivity::where('project_id',$project->id)->first();

        if ($prexc_activity) {
          $prexc_activity->investment_target_2016 = $project->investment_target_2016;
          $prexc_activity->investment_target_2017 = $project->investment_target_2017;
          $prexc_activity->investment_target_2018 = $project->investment_target_2018;
          $prexc_activity->investment_target_2019 = $project->investment_target_2019;
          $prexc_activity->investment_target_2020 = $project->investment_target_2020;
          $prexc_activity->investment_target_2021 = $project->investment_target_2021;
          $prexc_activity->investment_target_2022 = $project->investment_target_2022;
          $prexc_activity->investment_target_2023 = $project->investment_target_2023;
          $prexc_activity->investment_target_2024 = $project->investment_target_2024;
          $prexc_activity->investment_target_2025 = $project->investment_target_2025;
          $prexc_activity->investment_target_total = $project->investment_target_total;
          $prexc_activity->infrastructure_target_2016 = $project->infrastructure_target_2016;
          $prexc_activity->infrastructure_target_2017 = $project->infrastructure_target_2017;
          $prexc_activity->infrastructure_target_2018 = $project->infrastructure_target_2018;
          $prexc_activity->infrastructure_target_2019 = $project->infrastructure_target_2019;
          $prexc_activity->infrastructure_target_2020 = $project->infrastructure_target_2020;
          $prexc_activity->infrastructure_target_2021 = $project->infrastructure_target_2021;
          $prexc_activity->infrastructure_target_2022 = $project->infrastructure_target_2022;
          $prexc_activity->infrastructure_target_2023 = $project->infrastructure_target_2023;
          $prexc_activity->infrastructure_target_2024 = $project->infrastructure_target_2024;
          $prexc_activity->infrastructure_target_2025 = $project->infrastructure_target_2025;
          $prexc_activity->infrastructure_target_total = $project->infrastructure_target_total;
          $prexc_activity->gaa_2016 = $project->gaa_2016;
          $prexc_activity->gaa_2017 = $project->gaa_2017;
          $prexc_activity->gaa_2018 = $project->gaa_2018;
          $prexc_activity->gaa_2019 = $project->gaa_2019;
          $prexc_activity->gaa_2020 = $project->gaa_2020;
          $prexc_activity->gaa_total = $project->gaa_total;
          $prexc_activity->nep_2016 = $project->nep_2016;
          $prexc_activity->nep_2017 = $project->nep_2017;
          $prexc_activity->nep_2018 = $project->nep_2018;
          $prexc_activity->nep_2019 = $project->nep_2019;
          $prexc_activity->nep_2020 = $project->nep_2020;
          $prexc_activity->nep_2021 = $project->nep_2021;
          $prexc_activity->nep_total = $project->nep_total;
          $prexc_activity->disbursement_2016 = $project->disbursement_2016;
          $prexc_activity->disbursement_2017 = $project->disbursement_2017;
          $prexc_activity->disbursement_2018 = $project->disbursement_2018;
          $prexc_activity->disbursement_2019 = $project->disbursement_2019;
          $prexc_activity->disbursement_2020 = $project->disbursement_2020;
          $prexc_activity->disbursement_total = $project->disbursement_total;
          $prexc_activity->save();
        }
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
