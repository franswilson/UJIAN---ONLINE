<?php

namespace App\Exports;

use App\Jawaban;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class NilaiExport implements FromCollection
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
        ->join('praktikum','praktikum.id','=','praktikum_user.praktikum_id')
        ->where('praktikum.id','=',$this->idNilai)
        ->select('users.name','praktikum_user.nilai','praktikum.nama')->get();

        // return Jawaban::where('praktikum_id','=',$this->idNilai)->get();
    }
}
