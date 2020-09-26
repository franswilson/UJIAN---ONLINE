<?php

namespace App\Imports;

use App\Soal;
use Maatwebsite\Excel\Concerns\ToModel;

class SoalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Soal([
            'soal' => $row[1],
            'a' => $row[2],
            'b' => $row[3],
            'c' => $row[4],
            'd' => $row[5],
            'e' => $row[6],
            'knc_jawaban' => $row[7],
        ]);
    }
}
