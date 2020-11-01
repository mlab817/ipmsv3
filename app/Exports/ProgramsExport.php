<?php

namespace App\Exports;

use App\Models\PrexcActivity;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProgramsExport implements FromView, Responsable, ShouldAutoSize, WithColumnFormatting, WithStyles, WithColumnWidths
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

    public function view(): View
    {
        return view('exports.programs', [
            'prexc_activities' => $this->prexc_activities
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 45,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'K' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'L' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'M' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
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
            'AF' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AG' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AH' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AI' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AJ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AK' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AL' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AM' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AN' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AO' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AP' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AQ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AR' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AS' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AT' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AU' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AV' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AW' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AX' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AY' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'AZ' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'BA' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'BB' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'BC' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'BD' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'BE' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'BF' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'BG' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'BH' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true ]],
            2 => ['font' => ['bold' => true ]],
        ];
    }

}
