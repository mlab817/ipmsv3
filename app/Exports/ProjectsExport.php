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
    		];
    }

    public function headings(): array
    {
        return [
        	'ID',
        	'PIPOL Code',
        	'PAP Title',
        	'PAP Type',
        	'Spatial Coverage',
        	'Description',
        	'Expected Outputs',
        	'Mode of Implementation',
        	'Main Funding Source',
        	'Funding Institution',
        	'Start',
        	'End',
        	'2016 & Prior',
        	'2017',
        	'2018',
        	'2019',
        	'2020',
        	'2021',
        	'2022',
        	'2023 & Beyond',
        	'Total Project Cost'
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function columnFormats(): array
    {
        return [
            'M' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'O' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'P' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'Q' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'R' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'S' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'T' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'U' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
