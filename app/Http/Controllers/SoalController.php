<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Jawaban;
use App\Waktu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;



class SoalController extends Controller
{

    public function getSoal(Request $request)
    {
        $timeNow = \Carbon\Carbon::now()->toDateTimeString();
        
        if(is_null($request->modul)){
            return Redirect()->Back()->with('gagal', 'Gagal Memulai Praktikum');
        }
        // $PrakId = $request->praktikum;
        $ModId = $request->modul;

        $cek = Waktu::select('waktu.*','modul.*')
            ->join('modul', 'modul.id', 'waktu.id_modul')
            ->where('waktu_mulai', '<=', $timeNow)
            ->where('waktu_selesai', '>=', $timeNow)
            ->where('id_modul', '=', $ModId)->first();

        $arr = Session::get('soal', []);
        if(empty($arr)){
            $user_id = Auth::user()->id;
            $cek1 = Jawaban::where('user_id', $user_id)->where('id_modul',$ModId)->first();
            if($cek1){
                return Redirect()->Back()->with('gagal', 'Anda Sudah mengambil kuis ini');
            }

            if($request->password == null){
                $password = "";
            }else{
                $password = $request->password;
            }

            if($cek->password != $password){         
                return Redirect()->Back()->with('gagal', 'Password Salah');
            }
        }


        if ($cek) {
            Session::push('jawab', []);
            Session::push('jawaban', []);
            if (empty(Session::get('soal'))) {
                // $soal = DB::table('tbl_soal')
                // ->join('praktikum','praktikum.id','tbl_soal.id_praktikum')
                // ->where('tbl_soal.aktif','=','Y')->where('praktikum.pretest','=','Y')
                // ->select('tbl_soal.*')->inRandomOrder()->paginate(20);
                $soal = Soal::where('aktif', '=', 1)->where('id_modul','=',$ModId)->inRandomOrder()->paginate(20);
                Session::push('soal', $soal);
            }

            return view('soal', compact('cek', 'ModId'));
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
