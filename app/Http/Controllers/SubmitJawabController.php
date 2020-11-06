<?php

namespace App\Http\Controllers;

use App\Jawaban;
//use App\Praktikum;
use App\Soal;
use App\Praktikum;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubmitJawabController extends Controller
{

    public function store(Request $request)
    {
        //$praktikum = \App\Praktikum::all();
        Session::forget('soal');
        Session::forget('jawab');
        Session::forget('jawaban');
        $benar = 10;
        $nilai = 0;
        if (!empty($request->pilihan)) {
            foreach ($request->pilihan as $i => $pilihan) {
                $find = Soal::where('id', $i)->first();
                if ($find->knc_jawaban == $pilihan) {
                    $nilai +=  $benar;
                }
            };
        }


        $jawaban = new Jawaban;
        $jawaban->user_id = Auth::user()->id;
        $jawaban->nama = Auth::user()->name;
        $jawaban->nilai = $nilai;
        $jawaban->praktikum_id = $request->praktikum;

        $jawaban->save();
        // dd($jawaban);
        return view('/home');

        // dd($nilai);
        // return $request;
    }
}
