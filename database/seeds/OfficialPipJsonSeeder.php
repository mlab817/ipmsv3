<?php

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class OfficialPipJsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(base_path().'/database/seeds/json/laravel-seeder.json');
        
        $data = json_decode($json);

        DB::table('projects')->truncate();

        foreach ($data as $obj) {
            $regions = $this->stringToArray($obj->states_id);
            $project = Project::create([
            	'pipol_url' => $obj->pipol_url,
            	'pipol_id' => $obj->id,
            	'title' => $obj->title,
            	'type_id' => $obj->type_id,
            	'regular' => $obj->regular,
            	// 'bases' => $obj->bases,
            	'description' => $obj->description,
            	// 'agency_id' => $obj->,
            	// 'motheragency_id' => $obj->,
            	'pipol_code' => $obj->pipol_code,
            	'spatial_coverage_id' => $obj->spatial_coverage_id,
            	'region_id' => $obj->region_id,
            	// 'states_id' => $obj->,
            	// 'inter' => $obj->,
            	// 'provinces_id' => $obj->,
            	// 'pip' => $obj->pip,
            	// 'pip_typo' => $obj->,
            	'research' => $obj->rd,
            	// 'cip' => $obj->,
            	// 'cip_typo' => $obj->,
            	'infrastructure' => $obj->infrastructure,
            	'rdip' => $obj->rdip,
            	'rdc_required' => $obj->rdc_required,
            	'rdc_endorsed' => $obj->rdc_endorsed,
            	'rdc_endorsed_date' => $obj->rdc_endorsed_date,
            	// 'currentlevel' => $obj->,
            	'neda_secretariat_review_date' => $obj->neda_secretariat_review_date,
            	'neda_submission_date' => $obj->neda_submission_date,
            	'icc_endorsed_date' => $obj->icc_endorsed_date,
            	'icc_approved_date' => $obj->icc_approved_date,
            	'neda_board_date' => $obj->neda_board_date,
            	// 'sectors' => $obj->,
            	// 'subsectors' => $obj->,
            	// 'project_status_id' => $obj->status,
            	'implementation_risk' => $obj->implementation_risk,
            	'project_status_id' => $obj->project_status_id,
            	'icc_required' => $obj->icc_required,
            	'updates' => $obj->updates,
            	'updates_date' => $obj->updates_date,
            	// 'mainpdp => $obj->,
            	// 'otherpdp' => $obj->,
            	// 'na_rm => $obj->,
            	'expected_outputs' => $obj->expected_outputs,
            	// 'agenda => $obj->,
            	//'sdg => $obj->,
            	'gad_id' => $obj->gad_id,
            	'target_start_year' => $obj->target_start_year,
            	'target_end_year' => $obj->target_end_year,
            	'technical_readiness_id' => $obj->technical_readiness_id,
            	'fs_assistance' => $obj->fs_assistance,
            	'fs_status_id' => $obj->fs_status,
            	'fs_end_date' => $obj->fs_end_date,
            	'fs_start_date' => $obj->fs_start_date,
            	'fs_target_2018' => $obj->fs_target_2018,
            	'fs_target_2019' => $obj->fs_target_2019,
            	'fs_target_2020' => $obj->fs_target_2020,
            	'fs_target_2021' => $obj->fs_target_2021,
            	'fs_target_2022' => $obj->fs_target_2022,
            	'technical_readiness_others' => $obj->technical_readiness_others,
            	'has_row' => $obj->has_row,
            	'has_rap' => $obj->has_rap,
            	'has_row_rap' => $obj->has_row_rap,
            	'row_affected' => $obj->row_affected,
            	'rap_affected'=> $obj->rap_affected,
            	'row_target_2017' => $obj->row_target_2017,
            	'row_target_2018' => $obj->row_target_2018,
            	'row_target_2019' => $obj->row_target_2019,
            	'row_target_2020' => $obj->row_target_2020,
            	'row_target_2021' => $obj->row_target_2021,
            	'row_target_2022' => $obj->row_target_2022,
            	'rap_target_2017' => $obj->rap_target_2017,
            	'rap_target_2018'=> $obj->rap_target_2018,
            	'rap_target_2019' => $obj->rap_target_2019,
            	'rap_target_2020' => $obj->rap_target_2020,
            	'rap_target_2021' => $obj->rap_target_2021,
            	'rap_target_2022' => $obj->rap_target_2022,
            	'employment_generated' => $obj->employment_generated,
            	// 'finance_source_projects => $obj->,
            	// 'other_fs => $obj->,
            	'implementation_mode_id' => $obj->implementation_mode_id,
            	// 'oda_funding => $obj->,
            	// 'it_2016_nglocal => $obj->,
            	// 'it_2017_nglocal => $obj->,
            	// 'it_2018_nglocal => $obj->,
            	// 'it_2019_nglocal => $obj->,
            	// 'it_2020_nglocal => $obj->,
            	// 'it_2021_nglocal => $obj->,
            	// 'it_2022_nglocal => $obj->,
            	// 'it_2023_nglocal => $obj->,
            	// 'it_2016_ngloan => $obj->,
            	// 'it_2017_ngloan => $obj->,
            	// 'it_2018_ngloan => $obj->,
            	// 'it_2019_ngloan => $obj->,
            	// 'it_2020_ngloan => $obj->,
            	// 'it_2021_ngloan => $obj->,
            	// 'it_2022_ngloan => $obj->,
            	// 'it_2023_ngloan => $obj->,
            	// 'it_2016_odagrant => $obj->,
            	// 'it_2017_odagrant => $obj->,
            	// 'it_2018_odagrant => $obj->,
            	// 'it_2019_odagrant => $obj->,
            	// 'it_2020_odagrant => $obj->,
            	// 'it_2021_odagrant => $obj->,
            	// 'it_2022_odagrant => $obj->,
            	// 'it_2023_odagrant => $obj->,
            	// 'it_2016_gocc => $obj->,
            	// 'it_2017_gocc => $obj->,
            	// 'it_2018_gocc => $obj->,
            	// 'it_2019_gocc => $obj->,
            	// 'it_2020_gocc => $obj->,
            	// 'it_2021_gocc => $obj->,
            	// 'it_2022_gocc => $obj->,
            	// 'it_2023_gocc => $obj->,
            	// 'it_2016_lgu => $obj->,
            	// 'it_2017_lgu => $obj->,
            	// 'it_2018_lgu => $obj->,
            	// 'it_2019_lgu => $obj->,
            	// 'it_2020_lgu => $obj->,
            	// 'it_2021_lgu => $obj->,
            	// 'it_2022_lgu => $obj->,
            	// 'it_2023_lgu => $obj->,
            	// 'it_2016_ps => $obj->,
            	// 'it_2017_ps => $obj->,
            	// 'it_2018_ps => $obj->,
            	// 'it_2019_ps => $obj->,
            	// 'it_2020_ps => $obj->,
            	// 'it_2021_ps => $obj->,
            	// 'it_2022_ps => $obj->,
            	// 'it_2023_ps => $obj->,
            	// 'it_2016_others => $obj->,
            	// 'it_2017_others => $obj->,
            	// 'it_2018_others => $obj->,
            	// 'it_2019_others => $obj->,
            	// 'it_2020_others => $obj->,
            	// 'it_2021_others => $obj->,
            	// 'it_2022_others => $obj->,
            	// 'it_2023_others => $obj->,
            	'nep_2017' => $obj->nep_2017,
            	'gaa_2017' => $obj->gaa_2017,
            	'disbursement_2017' => $obj->disbursement_2017,
            	'nep_2018' => $obj->nep_2018,
            	'gaa_2018'=> $obj->gaa_2018,
            	'disbursement_2018' => $obj->disbursement_2018,
            	'nep_2019' => $obj->nep_2019,
            	'gaa_2019' => $obj->gaa_2019,
            	'disbursement_2019' => $obj->disbursement_2019,
            	'nep_2020' => $obj->nep_2020,
            	'gaa_2020' => $obj->gaa_2020,
            	'disbursement_2020' => $obj->disbursement_2020,
            	'nep_2021' => $obj->nep_2021,
            	'gaa_2021' => $obj->gaa_2021,
            	'disbursement_2021' => $obj->disbursement_2021,
            	'nep_2022' => $obj->nep_2022,
            	'gaa_2022' => $obj->gaa_2022,
            	'disbursement_2022' => $obj->disbursement_2022,
            	// '2016_NCR => $obj->,
            	// '2016_CAR => $obj->,
            	// '2016_Region_I => $obj->,
            	// '2016_Region_II => $obj->,
            	// '2016_Region_III => $obj->,
            	// '2016_Region_IVA => $obj->,
            	// '2016_Region_IVB => $obj->,
            	// '2016_Region_V => $obj->,
            	// '2016_Region_VI => $obj->,
            	// '2016_Region_VII => $obj->,
            	// '2016_Region_VIII => $obj->,
            	// '2016_Region_IX => $obj->,
            	// '2016_Region_X => $obj->,
            	// '2016_Region_XI => $obj->,
            	// '2016_Region_XII => $obj->,
            	// '2016_Region_XIII => $obj->,
            	// '2016_BARMM => $obj->,
            	// '2017_NCR => $obj->,
            	// '2017_CAR => $obj->,
            	// '2017_Region_I => $obj->,
            	// '2017_Region_II => $obj->,
            	// '2017_Region_III => $obj->,
            	// '2017_Region_IVA => $obj->,
            	// '2017_Region_IVB => $obj->,
            	// '2017_Region_V => $obj->,
            	// '2017_Region_VI => $obj->,
            	// '2017_Region_VII => $obj->,
            	// '2017_Region_VIII => $obj->,
            	// '2017_Region_IX => $obj->,
            	// '2017_Region_X => $obj->,
            	// '2017_Region_XI => $obj->,
            	// '2017_Region_XII => $obj->,
            	// '2017_Region_XIII => $obj->,
            	// '2017_BARMM => $obj->,
            	// '2018_NCR => $obj->,
            	// '2018_CAR => $obj->,
            	// '2018_Region_I => $obj->,
            	// '2018_Region_II => $obj->,
            	// '2018_Region_III => $obj->,
            	// '2018_Region_IVA => $obj->,
            	// '2018_Region_IVB => $obj->,
            	// '2018_Region_V => $obj->,
            	// '2018_Region_VI => $obj->,
            	// '2018_Region_VII => $obj->,
            	// '2018_Region_VIII => $obj->,
            	// '2018_Region_IX => $obj->,
            	// '2018_Region_X => $obj->,
            	// '2018_Region_XI => $obj->,
            	// '2018_Region_XII => $obj->,
            	// '2018_Region_XIII => $obj->,
            	// '2018_BARMM => $obj->,
            	// '2019_NCR => $obj->,
            	// '2019_CAR => $obj->,
            	// '2019_Region_I => $obj->,
            	// '2019_Region_II => $obj->,
            	// '2019_Region_III => $obj->,
            	// '2019_Region_IVA => $obj->,
            	// '2019_Region_IVB => $obj->,
            	// '2019_Region_V => $obj->,
            	// '2019_Region_VI => $obj->,
            	// '2019_Region_VII => $obj->,
            	// '2019_Region_VIII => $obj->,
            	// '2019_Region_IX => $obj->,
            	// '2019_Region_X => $obj->,
            	// '2019_Region_XI => $obj->,
            	// '2019_Region_XII => $obj->,
            	// '2019_Region_XIII => $obj->,
            	// '2019_BARMM => $obj->,
            	// '2020_NCR => $obj->,
            	// '2020_CAR => $obj->,
            	// '2020_Region_I => $obj->,
            	// '2020_Region_II => $obj->,
            	// '2020_Region_III => $obj->,
            	// '2020_Region_IVA => $obj->,
            	// '2020_Region_IVB => $obj->,
            	// '2020_Region_V => $obj->,
            	// '2020_Region_VI => $obj->,
            	// '2020_Region_VII => $obj->,
            	// '2020_Region_VIII => $obj->,
            	// '2020_Region_IX => $obj->,
            	// '2020_Region_X => $obj->,
            	// '2020_Region_XI => $obj->,
            	// '2020_Region_XII => $obj->,
            	// '2020_Region_XIII => $obj->,
            	// '2020_BARMM => $obj->,
            	// '2021_NCR => $obj->,
            	// '2021_CAR => $obj->,
            	// '2021_Region_I => $obj->,
            	// '2021_Region_II => $obj->,
            	// '2021_Region_III => $obj->,
            	// '2021_Region_IVA => $obj->,
            	// '2021_Region_IVB => $obj->,
            	// '2021_Region_V => $obj->,
            	// '2021_Region_VI => $obj->,
            	// '2021_Region_VII => $obj->,
            	// '2021_Region_VIII => $obj->,
            	// '2021_Region_IX => $obj->,
            	// '2021_Region_X => $obj->,
            	// '2021_Region_XI => $obj->,
            	// '2021_Region_XII => $obj->,
            	// '2021_Region_XIII => $obj->,
            	// '2021_BARMM => $obj->,
            	// '2022_NCR => $obj->,
            	// '2022_CAR => $obj->,
            	// '2022_Region_I => $obj->,
            	// '2022_Region_II => $obj->,
            	// '2022_Region_III => $obj->,
            	// '2022_Region_IVA => $obj->,
            	// '2022_Region_IVB => $obj->,
            	// '2022_Region_V => $obj->,
            	// '2022_Region_VI => $obj->,
            	// '2022_Region_VII => $obj->,
            	// '2022_Region_VIII => $obj->,
            	// '2022_Region_IX => $obj->,
            	// '2022_Region_X => $obj->,
            	// '2022_Region_XI => $obj->,
            	// '2022_Region_XII => $obj->,
            	// '2022_Region_XIII => $obj->,
            	// '2022_BARMM => $obj->,
            	// '2023_NCR => $obj->,
            	// '2023_CAR => $obj->,
            	// '2023_Region_I => $obj->,
            	// '2023_Region_II => $obj->,
            	// '2023_Region_III => $obj->,
            	// '2023_Region_IVA => $obj->,
            	// '2023_Region_IVB => $obj->,
            	// '2023_Region_V => $obj->,
            	// '2023_Region_VI => $obj->,
            	// '2023_Region_VII => $obj->,
            	// '2023_Region_VIII => $obj->,
            	// '2023_Region_IX => $obj->,
            	// '2023_Region_X => $obj->,
            	// '2023_Region_XI => $obj->,
            	// '2023_Region_XII => $obj->,
            	// '2023_Region_XIII => $obj->,
            	// '2023_BARMM => $obj->,
            	// 'rm => $obj->,
            	// 'status2 => $obj->,
            	'investment_target_2016' => $obj->investment_target_2016,
            	'investment_target_2017' => $obj->investment_target_2017,
            	'investment_target_2018' => $obj->investment_target_2018,
            	'investment_target_2019' => $obj->investment_target_2019,
            	'investment_target_2020' => $obj->investment_target_2020,
            	'investment_target_2021' => $obj->investment_target_2021,
            	'investment_target_2022' => $obj->investment_target_2022,
            	'investment_target_2023' => $obj->investment_target_2023,
            	'infrastructure_target_2016' => $obj->infrastructure_target_2016,
            	'infrastructure_target_2017' => $obj->infrastructure_target_2017,
            	'infrastructure_target_2018' => $obj->infrastructure_target_2018,
            	'infrastructure_target_2019' => $obj->infrastructure_target_2019,
            	'infrastructure_target_2020' => $obj->infrastructure_target_2020,
            	'infrastructure_target_2021' => $obj->infrastructure_target_2021,
            	'infrastructure_target_2022' => $obj->infrastructure_target_2022,
            	'infrastructure_target_2023' => $obj->infrastructure_target_2023,
            	'total_project_cost' => $obj->total_project_cost
            ]);
            
            $project->bases()->sync($this->stringToArray($obj->bases));

            $project->sustainable_development_goals()->sync($this->stringToArray($obj->sdg));

            $project->provinces()->sync($this->stringToArray($obj->provinces_id));
            
            $project->regions()->sync($this->stringToArray($obj->states_id));
            
            $project->ten_point_agenda()->sync($this->stringToArray($obj->agenda));
        }
    }

    public function stringToArray($str) {

          $array = array();
          
          $arr = str_replace(array('\"','\'','[',']',' '),'',$str);

          if ($arr) {
            $arr_explode = explode(',',$arr);

            var_dump($arr_explode);
          }

          return null;
      }
}
