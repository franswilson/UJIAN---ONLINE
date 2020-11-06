<?php

namespace App\Exports;

use App\Soal;
use Maatwebsite\Excel\Concerns\FromCollection;

class SoalExport implements FromCollection
{
    private $IdPraktikum;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($IdPraktikum){
      $this->IdPraktikum = $IdPraktikum;
    }

    public function collection()
    {
        return Soal::where('id_praktikum','=',$this->IdPraktikum)->select('id','soal','a','b','c','d','e','knc_jawaban')->get();
    }
}
