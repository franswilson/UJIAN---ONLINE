<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Waktu;
use Illuminate\Support\Facades\Session;

class SoalController extends Controller
{

    public function getSoal()
    {
        date_default_timezone_set("Asia/Bangkok");
        // \Carbon\Carbon::setLocale('id');
        $timeNow = \Carbon\Carbon::now()->toDateTimeString();
        // dd($timeNow);
        $cek = Waktu::where('waktu_mulai', '<=', $timeNow)->where('waktu_selesai', '>=', $timeNow)->first();
        // dd($cek);
        if ($cek) {
            $praktikum = \App\Praktikum::where('aktif', '=', 'Y')->get();

            Session::push('jawab', []);
            Session::push('jawaban', []);
            if (empty(Session::get('soal'))) {
                $soal = Soal::where('aktif', '=', 'Y')->inRandomOrder()->paginate(10);
                Session::push('soal', $soal);
            }
            return view('soal', compact('praktikum', 'cek'));
        }

        return Redirect()->Back();
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
