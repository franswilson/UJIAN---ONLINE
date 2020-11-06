<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Waktu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{

    public function getSoal(Request $request)
    {
        //return response()->json(['message'=>'OK'],200);
        date_default_timezone_set("Asia/Bangkok");
        // \Carbon\Carbon::setLocale('id');
        $timeNow = \Carbon\Carbon::now()->toDateTimeString();
        // dd($timeNow);

        $PrakId = $request->praktikum;

        $cek = Waktu::where('waktu_mulai', '<=', $timeNow)
        ->where('waktu_selesai', '>=', $timeNow)
        ->where('id_praktikum','=',$PrakId)->first();
        //dd($PrakId);

        // dd($cek);
        if ($cek) {
            Session::push('jawab', []);
            Session::push('jawaban', []);
            if (empty(Session::get('soal'))) {
                // $soal = DB::table('tbl_soal')
                // ->join('praktikum','praktikum.id','tbl_soal.id_praktikum')
                // ->where('tbl_soal.aktif','=','Y')->where('praktikum.pretest','=','Y')
                // ->select('tbl_soal.*')->inRandomOrder()->paginate(20);
                $soal = Soal::where('aktif', '=', 'Y')->where('id_praktikum', '=', $PrakId)->inRandomOrder()->paginate(20);
                Session::push('soal', $soal);
            }
            return view('soal', compact('cek'));
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
