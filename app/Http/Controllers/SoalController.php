<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;

class SoalController extends Controller
{

    public function getSoal()
    {
        $soal = Soal::where('aktif', '=', 'Y')->inRandomOrder()->get();
        return view('soal', compact('soal'));
    }

    public function getJawaban()
    {
        return view('jawaban');
    }
}
