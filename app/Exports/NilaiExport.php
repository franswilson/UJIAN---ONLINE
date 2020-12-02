<?php

namespace App\Exports;

use App\Jawaban;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection,WithHeadings
{
    private $idNilai;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($idNilai){
      $this->idNilai = $idNilai;
    }

    public function collection()
    {
        return DB::table('users')
        ->join('praktikum_user','users.id','=','praktikum_user.user_id')
        ->join('modul','modul.id','=','praktikum_user.id_modul')
        ->join('praktikum','praktikum.id','=','modul.id_praktikum')
        ->where('praktikum.id','=',$this->idNilai)
        ->select('users.name', 'users.npm','praktikum_user.nilai','praktikum.nama','modul.nama as modul')->get();

        // return Jawaban::where('praktikum_id','=',$this->idNilai)->get();
    }

    public function headings(): array
    {
        return ['Nama', 'NPM','Nilai', 'Praktikum', 'Modul'];
    }
}
