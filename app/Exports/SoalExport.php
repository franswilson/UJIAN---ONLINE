<?php

namespace App\Exports;

use App\Soal;
use Maatwebsite\Excel\Concerns\FromCollection;

class SoalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Soal::all();
    }
}
