<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class DashboardController extends Controller
{
  public function index()
  {
    if (Auth::user()->role == 'admin') {
      $idlab = Auth::user()->npm;
      $praktikum = \App\Praktikum::where('aktif', '=', '1')->where('id_lab',$idlab)->get();
      // $praktikumUser = DB::table('praktikum_user')->where('praktikum_id', '=', 1)->get();
      $list = [];
      $j = 0;

      // for ($i = 2019; $i < 2024; $i++) {
      //   $temp = 0;
      //   foreach ($praktikumUser as $item) {
      //     if (substr($item->created_at, 0, 4) == $i) {
      //       $temp++;
      //     }
      //   }
      //   $list[$j]['x'] = $i;
      //   $list[$j]['y'] = $temp;
      //   $j++;
      // }

      $userPraktikan = DB::table('users')->where('role', '=', 'mahasiswa')->count();
      $userAslab = DB::table('users')->where('role', '=', 'admin')->count();
      $jumlahSoal = DB::table('tbl_soal')->count();
      $jumlahPraktikum = DB::table('praktikum')->count();


      return view('dashboard.index', compact('praktikum', 'userPraktikan', 'userAslab', 'jumlahSoal', 'jumlahPraktikum'));
    } else {
      // $praktikum = \App\Praktikum::where('aktif', '=', 1)->get();
      Session::forget('soal');
      Session::forget('jawab');
      Session::forget('jawaban');
      
      $modul = \App\Modul::select('modul.*', 'praktikum.nama as namaPraktikum', 'waktu.*', 'modul.id as idModul')
        ->join('praktikum','praktikum.id','modul.id_praktikum')
        ->join('waktu','waktu.id_modul','modul.id')
        ->where('praktikum.aktif', 1)
        ->where('modul.aktif', 1)
        // ->where(function($q){
        //   $q->whereDate('waktu.waktu_mulai', '>=', Carbon::now()->format('Y-m-d H:i:s'));
        //   $q->whereDate('waktu.waktu_selesai', '<=', Carbon::now()->format('Y-m-d H:i:s'));
        //  })
        ->get();

      $waktu = DB::table('waktu')
        ->join('modul', 'modul.id', '=', 'waktu.id_modul')
        ->join('praktikum', 'praktikum.id', '=', 'modul.id_praktikum')
        ->select('waktu.id', 'praktikum.nama', 'waktu.waktu_mulai', 'waktu.waktu_selesai','modul.nama as namaModul')
        ->where('praktikum.aktif', '=', '1')
        ->where('modul.aktif', '=', '1')->get();
        
      return view('dashboard.index', compact('waktu', 'modul'));
    }
  }
}
