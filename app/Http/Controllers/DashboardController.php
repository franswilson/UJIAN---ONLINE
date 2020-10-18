<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public  function index()
    {
      $waktu = DB::table('waktu')
      ->join('praktikum','praktikum.id','=','waktu.id_praktikum')
      ->select('waktu.id','praktikum.nama','waktu.waktu_mulai','waktu.waktu_selesai')->get();

        $praktikum = \App\Praktikum::where('aktif', '=', 'Y')->get();
        return view('dashboard.index', compact('praktikum','waktu'));
    }
}
