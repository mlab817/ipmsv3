<?php

namespace App\Exports;

use App\Models\PrexcActivity;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PrexcActivityExport implements FromCollection, WithMapping, WithColumnFormatting
{
    use Exportable;

    private $filename = 'prexc-activities.xlsx';

    private $writerType = Excel::XLSX;

    private $headers = [
        'Content-Type' => 'text/csv'
    ];

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PrexcActivity::all();
    }

    /**
     * @var PrexcActivity $prexc_activity
     * @return array
     */
    public function map($prexc_activity): array
    {
        return [
            $prexc_activity->id,
            $prexc_activity->prexc_program->name ?? '',
            $prexc_activity->prexc_subprogram->name ?? '',
            $prexc_activity->name,
            $prexc_activity->uacs_code,
            $prexc_activity->infrastructure_target_2016,
            $prexc_activity->infrastructure_target_2017,
            $prexc_activity->infrastructure_target_2018,
            $prexc_activity->infrastructure_target_2019,
            $prexc_activity->infrastructure_target_2020,
            $prexc_activity->infrastructure_target_2021,
            $prexc_activity->infrastructure_target_2022,
            $prexc_activity->infrastructure_target_2023,
            $prexc_activity->infrastructure_target_2024,
            $prexc_activity->infrastructure_target_2025,
            '=F2+G2+H2+I2+J2+K2+L2+M2+N2+O2+P2',
            $prexc_activity->investment_target_2016,
            $prexc_activity->investment_target_2017,
            $prexc_activity->investment_target_2018,
            $prexc_activity->investment_target_2019,
            $prexc_activity->investment_target_2020,
            $prexc_activity->investment_target_2021,
            $prexc_activity->investment_target_2022,
            $prexc_activity->investment_target_2023,
            $prexc_activity->investment_target_2024,
            $prexc_activity->investment_target_2025,
            '=Q2+R2+S2+T2+U2+V2+W2+X2+Y2+Z2+AA2',
            $prexc_activity->nep_2016,
            $prexc_activity->nep_2017,
            $prexc_activity->nep_2018,
            $prexc_activity->nep_2019,
            $prexc_activity->nep_2020,
            $prexc_activity->nep_2021,
            $prexc_activity->nep_2022,
            $prexc_activity->nep_2023,
            $prexc_activity->nep_2024,
            $prexc_activity->nep_2025,
            '=AA2+AB2+AC2+AD2+AE2+AF2+AG2+AH2+AI2+AJ2+AK2',
            $prexc_activity->gaa_2016,
            $prexc_activity->gaa_2017,
            $prexc_activity->gaa_2018,
            $prexc_activity->gaa_2019,
            $prexc_activity->gaa_2020,
            $prexc_activity->gaa_2021,
            $prexc_activity->gaa_2022,
            $prexc_activity->gaa_2023,
            $prexc_activity->gaa_2024,
            $prexc_activity->gaa_2025,
            '=AM2+AN2+AO2+AP2+AQ2+AR2+AS2+AT2+AU2+AV2+AW2+AX2',
            $prexc_activity->disbursement_2016,
            $prexc_activity->disbursement_2017,
            $prexc_activity->disbursement_2018,
            $prexc_activity->disbursement_2019,
            $prexc_activity->disbursement_2020,
            $prexc_activity->disbursement_2021,
            $prexc_activity->disbursement_2022,
            $prexc_activity->disbursement_2023,
            $prexc_activity->disbursement_2024,
            $prexc_activity->disbursement_2025,
            '=AY2+AZ2+BA2+BB2+BC2+BD2+BE2+BF2+BG2',
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
