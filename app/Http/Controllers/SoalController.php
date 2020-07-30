<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use Illuminate\Support\Facades\Session;

class SoalController extends Controller
{

    public function getSoal()
    {
        $praktikum = \App\Praktikum::where('aktif', '=', 'Y')->get();

        $soal = Soal::where('aktif', '=', 'Y')->inRandomOrder()->paginate(10);
        // Session::forget('jawab');
        // Session::forget('jawaban');
        Session::push('jawab', []);
        Session::push('jawaban', []);
        Session::push('soal', $soal);
        return view('soal', ['praktikum' => $praktikum]);
    }


    public function simpansoal($id, $jawab)
    {
        $arr = Session::get('jawab', []);
        $arrr = Session::get('jawaban', []);
        array_push($arr, $id);
        array_push($arrr, $jawab);
        Session::put('jawab', $arr);
        Session::put('jawaban', $arrr);

        echo json_encode($arr);
        echo json_encode($arrr);
    }


    public function getJawaban()
    {
        return view('jawaban');
    }
}
