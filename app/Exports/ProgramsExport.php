<?php

namespace App\Exports;

use App\Models\PrexcActivity;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;

class ProgramsExport implements FromCollection, WithMapping, ShouldQueue, WithHeadings, WithCustomStartCell, WithTitle, ShouldAutoSize, Responsable
{
    use Exportable;

    private $prexc_activities;

    private $fileName = 'programs.xlsx';

    private $writerType = Excel::XLSX;

    private $headers = [
        'Content-Type' => 'text/csv'
    ];

    public function __construct($prexc_activities)
    {
        $this->prexc_activities = $prexc_activities;
    }

    public function collection()
    {
        $prexc_activities = $this->prexc_activities;
        
        return $prexc_activities;
    }

    public function map($prexc_activity): array
    {
        return [
          'id' => $prexc_activity->id,
          'program' => $prexc_activity->prexc_program ? $prexc_activity->prexc_program->name : '',
          'subprogram' => $prexc_activity->prexc_subprogram ? $prexc_activity->prexc_subprogram->name : '',
          'activity' => $prexc_activity->name,
            'uacs_code' => $prexc_activity->uacs_code,
        ];
    }

    public function headings(): array
    {
        return [
            [
                'ID',
                'Program',
                'Subprogram',
                'Activity',
                'UACS Code',
                'Infrastructure Investments',
            ],
            [
                '',
                '',
                '',
                '',
                '',
                '2016',
                '2017',
                '2018'
            ]
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function title(): string
    {
        return 'programs';
    }

}
