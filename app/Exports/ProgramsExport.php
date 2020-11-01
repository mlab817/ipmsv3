<?php

namespace App\Exports;

use App\Models\PrexcActivity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProgramsExport implements FromCollection, ShouldQueue
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PrexcActivity::all();
    }
}
