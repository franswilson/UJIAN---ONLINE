<?php

namespace App\Imports;

use App\Soal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SoalImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Soal([
            'id_praktikum' => $row[0],
            'id_modul' => $row[1],
            'soal' => $row[2],
            'a' => $row[3],
            'b' => $row[4],
            'c' => $row[5],
            'd' => $row[6],
            'e' => $row[7],
            'knc_jawaban' => $row[8],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
