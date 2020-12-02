<?php

namespace App\Exports;

use App\Soal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SoalExport implements FromCollection,WithHeadings
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
        return DB::table('tbl_soal')
        ->join('modul', 'modul.id','=','tbl_soal.id_modul')
        ->join('praktikum', 'praktikum.id','=','modul.id_praktikum')
        ->where('praktikum.id','=',$this->IdPraktikum)
        ->select( 'praktikum.id', 'tbl_soal.id_modul', 'tbl_soal.soal', 'tbl_soal.a', 'tbl_soal.b', 'tbl_soal.c', 'tbl_soal.d', 'tbl_soal.e',
        'tbl_soal.knc_jawaban')->get();

    }
    public function headings(): array
    {
        return ['id modul','Soal', 'a', 'b', 'c', 'd', 'e', 'kunci jawaban'];
    }
}
