<?php

namespace App\Exports;

use Log;
use App\Models\Project;
use App\Scopes\ProjectScope;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProjectsExport implements FromQuery, WithMapping, WithHeadings, WithCustomStartCell, WithColumnFormatting
{		
		/**
		 * Disable global scope
		 * 
		 */ 
		public function query()
		{
			return Project::query()->withoutGlobalScope(ProjectScope::class);
		}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($project): array
    {	
    		return [
    			$project->id,
    			$project->pipol_code,
    			$project->title,
    			$project->type->name ?? '',
                $project->infrastructure ? 'Yes' : 'No',
    			$project->spatial_coverage->name ?? '',
    			$project->description,
    			$project->expected_outputs,
    			$project->implementation_mode->name ?? '',
    			$project->main_funding_source->name ?? '',
    			$project->funding_institution->name ?? '',
    			$project->target_start_year,
    			$project->target_end_year,
    			$project->investment_target_2016,
    			$project->investment_target_2017,
    			$project->investment_target_2018,
    			$project->investment_target_2019,
    			$project->investment_target_2020,
    			$project->investment_target_2021,
    			$project->investment_target_2022,
    			$project->investment_target_2023,
    			$project->investment_target_total,
                $project->infrastructure_target_2016,
                $project->infrastructure_target_2017,
                $project->infrastructure_target_2018,
                $project->infrastructure_target_2019,
                $project->infrastructure_target_2020,
                $project->infrastructure_target_2021,
                $project->infrastructure_target_2022,
                $project->infrastructure_target_2023,
                $project->infrastructure_target_total,
    		];
    }

    public function headings(): array
    {
        return [
        	'ID',
        	'PIPOL Code',
        	'PAP Title',
        	'PAP Type',
            'Infrastructure',
        	'Spatial Coverage',
        	'Description',
        	'Expected Outputs',
        	'Mode of Implementation',
        	'Main Funding Source',
        	'Funding Institution',
        	'Start',
        	'End',
        	'Total_2016 & Prior',
        	'Total_2017',
        	'Total_2018',
        	'Total_2019',
        	'Total_2020',
        	'Total_2021',
        	'Total_2022',
        	'Total_2023 & Beyond',
        	'Total Cost',
            'Infrastructure_2016 & Prior',
            'Infrastructure_2017',
            'Infrastructure_2018',
            'Infrastructure_2019',
            'Infrastructure_2020',
            'Infrastructure_2021',
            'Infrastructure_2022',
            'Infrastructure_2023 & Beyond',
            'Infrastructure Total Cost',
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function columnFormats(): array
    {
        return [
            'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'P' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'R' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'S' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'T' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'U' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'V' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'W' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'X' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'Y' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'Z' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AA' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AB' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AC' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AD' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AE' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
