<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Praktikum;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\NilaiExport;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $user = \App\User::all();
        return view('user.index', ['user' => $user]);
    }
    public function nilai()
    {
      $nilai = DB::table('praktikum_user')
          ->join('praktikum', 'praktikum.id', '=', 'praktikum_user.praktikum_id')
          ->join('modul', 'modul.id', '=', 'praktikum_user.id_modul')
          ->select( 'praktikum.nama as nama_prak', 'modul.nama as nama_mod', 'praktikum_user.nama', 'praktikum_user.nilai'
          )->get();
      $praktikum = \App\Praktikum::all();
      return view('nilai.index', ['nilai' => $nilai], compact('praktikum'));
    }


    public function profile()
    {

        $id = auth()->user()->id;
        $profile  = \App\User::find($id);
        $praktikum = \App\Praktikum::all();
        $modul = DB::table('praktikum_user')
            ->join('praktikum', 'praktikum.id', '=', 'praktikum_user.praktikum_id')
            ->join('modul', 'modul.id', '=', 'praktikum_user.id_modul')
            ->where('praktikum_user.user_id','=',$id) 
            ->select( 'praktikum.nama as nama_prak', 'modul.nama as nama_mod', 'praktikum_user.nama', 'praktikum_user.nilai')
            ->get();
        return view('user.profile', ['profile' => $profile], compact('modul'));
    }

    public function create(Request $request)
    {
        \App\User::create($request->all());
        return redirect('/user')->with('sukses', 'Data berhasil di input');
    }
    public function edit($id)
    {
        $user = \App\User::find($id);
        return view('user/edit', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->update($request->all());
        return redirect('/user')->with('sukses', 'Data berhasil di ubah');
    }
    public function delete($id)
    {
        $user = \App\User::find($id);
        $user->delete($user);
        return redirect('/user')->with('sukses', 'Data berhasil di hapus');
    }
    public function export_excel(Request $request)
    {
        $idPrak = $request->praktikum;
        $prak =  Praktikum::where('id', '=', $idPrak)->select('nama')->first();
        return Excel::download(new NilaiExport($idPrak), "Nilai Praktikum " . $prak->nama . ".xlsx");
    }
}
