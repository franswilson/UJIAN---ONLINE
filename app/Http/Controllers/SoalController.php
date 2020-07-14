<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;

class SoalController extends Controller
{

    public function getSoal()
    {
        $praktikum = \App\Praktikum::where('aktif', '=', 'Y')->get();
        $soal = Soal::where('aktif', '=', 'Y')->inRandomOrder()->get();
        return view('soal', ['soal' => $soal, 'praktikum' => $praktikum]);
    }



    public function getJawaban()
    {
        return view('jawaban');
    }
}
