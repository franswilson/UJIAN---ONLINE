<?php

namespace App\Http\Controllers;

use App\Jawaban;
use App\Soal;
use Auth;
use Illuminate\Http\Request;

class SubmitJawabController extends Controller
{
    public function store(Request $request)
    {
        $benar = 10;
        $nilai = 0;
        foreach ($request->pilihan as $i => $pilihan) {
            $find = Soal::where('id_soal', $i)->first();
            if ($find->knc_jawaban == $pilihan) {
                $nilai +=  $benar;
            }
        };

        $jawaban = new Jawaban;
        $jawaban->id_user = Auth::user()->id;
        $jawaban->nama = Auth::user()->name;
        $jawaban->nilai = $nilai;
        $jawaban->save();
        return view('/home');
        // dd($nilai);
        // return $request;

    }
}
