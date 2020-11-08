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
            'soal' => $row[1],
            'a' => $row[2],
            'b' => $row[3],
            'c' => $row[4],
            'd' => $row[5],
            'e' => $row[6],
            'knc_jawaban' => $row[7],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
