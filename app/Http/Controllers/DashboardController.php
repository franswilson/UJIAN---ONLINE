<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
      if(Auth::user()->role == 'admin'){
        $praktikum = \App\Praktikum::where('aktif', '=', 'Y')->get();
        $praktikumUser = DB::table('praktikum_user')->where('praktikum_id', '=', 1)->get();
        $list = [];
        $j = 0;

        for($i=2019 ; $i<2024 ; $i++){
          $temp = 0;          
          foreach($praktikumUser as $item){
            if(substr($item->created_at,0,4) == $i){
                $temp++;
            }
          }
          $list[$j]['x'] = $i;
          $list[$j]['y'] = $temp;
          $j++;
        }    

        $userPraktikan = DB::table('users')->where('role','=','mahasiswa')->count();
        $userAslab = DB::table('users')->where('role','=','admin')->count();
        $jumlahSoal = DB::table('tbl_soal')->count();
        $jumlahPraktikum = DB::table('praktikum')->count();


        return view('dashboard.index', compact('praktikum', 'list', 'userPraktikan', 'userAslab', 'jumlahSoal', 'jumlahPraktikum'));
//        return response($list);
      }else{
        $praktikum = \App\Praktikum::where('aktif', '=', 'Y')->get();
        $waktu = DB::table('waktu')
        ->join('praktikum','praktikum.id','=','waktu.id_praktikum')
        ->select('waktu.id','praktikum.nama','waktu.waktu_mulai','waktu.waktu_selesai')->get();
        return view('dashboard.index', compact('praktikum','waktu'));
      }

    }
}
