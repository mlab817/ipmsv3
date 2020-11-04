<?php

namespace App\Exports;

use App\Models\PrexcActivity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class PrexcActivityExport implements FromCollection, WithMapping
{
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
}
