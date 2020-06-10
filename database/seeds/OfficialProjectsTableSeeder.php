<?php

use Illuminate\Database\Seeder;

use App\Models\ProjectStatus;
use App\Models\SpatialCoverage;

class OfficialProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    		DB::table('projects')->truncate();

    		$json = \Illuminate\Support\Facades\File::get('database/data/projects.json');
        $data = json_decode($json);

        // dd($data);

        foreach ($data as $obj) {

        		$ouId = null;

        		$ou = \App\Models\OperatingUnit::where('acronym',$obj->attached_agency)->first();

        		if (!$ou) {
        			$ouId = null;
        		} else {
        			$ouId = $ou->id;
        		}

            \App\Models\Project::updateOrCreate([
            			'id' => $obj->id,
	            ],
	            [
	                'pipol_code' => $obj->pipol_code,
	                'title' => $obj->title,
	                'description' => $obj->description,
	                'expected_outputs' => $obj->expected_outputs,
	                'operating_unit_id' => $ouId,
	                'spatial_coverage_id' => SpatialCoverage::where('name', $obj->spatial_coverage)->first()->id,
	                'investment_target_2016' => floatval(preg_replace("/[^-0-9\.]/","",$obj->investment_target_2016)),
	                'investment_target_2017' => floatval(preg_replace("/[^-0-9\.]/","",$obj->investment_target_2017)),
	                'investment_target_2018' => floatval(preg_replace("/[^-0-9\.]/","",$obj->investment_target_2018)),
	                'investment_target_2019' => floatval(preg_replace("/[^-0-9\.]/","",$obj->investment_target_2019)),
	                'investment_target_2020' => floatval(preg_replace("/[^-0-9\.]/","",$obj->investment_target_2020)),
	                'investment_target_2022' => floatval(preg_replace("/[^-0-9\.]/","",$obj->investment_target_2022)),
	                'investment_target_2023' => floatval(preg_replace("/[^-0-9\.]/","",$obj->investment_target_2023)),
	                'total_project_cost' => floatval(preg_replace("/[^-0-9\.]/","",$obj->total_project_cost)),
	                'target_start_year' => $obj->target_start_year,
	                'target_end_year' => $obj->target_end_year,
	                'project_status_id' => ProjectStatus::where('name',$obj->project_status)->first()->id,
	                'created_by' => 1
            ]);
        }
    }
}
