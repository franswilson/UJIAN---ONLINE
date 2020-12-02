<?php

namespace App\Http\Controllers;

use App\Data_soal;
use Illuminate\Http\Request;

use Session;

use App\Modul;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;


class ModulController extends Controller
{
    public function index(){
        $idlab = Auth::user()->npm;
        $modul = \App\Modul::select('modul.*', 'praktikum.nama as namaPraktikum')
                ->join('praktikum','praktikum.id','modul.id_praktikum')
                ->where('praktikum.aktif', 1)
                ->where('praktikum.id_lab', $idlab)
                ->get();
        
        $praktikum = \App\Praktikum::where('aktif', '=', '1')->where('id_lab',$idlab)->get();

      return view('data-modul.modul', ['modul' => $modul, 'praktikum'=>$praktikum]);
    }

    public function create(Request $request)
    {
        \App\Modul::create([
            'nama' => $request->nama,
            'aktif' => 1,
            'id_praktikum' => $request->idpraktikum,
            'password' => ''
        ]);

        return redirect('/modul')->with('sukses', 'Data berhasil di input');
    }

    public function delete($id)
    {
        $modul = \App\Modul::find($id);
        $modul->delete($modul);
        return redirect('/modul')->with('sukses', 'Data berhasil di hapus');
    }

    public function edit($id)
    {
        $modul = \App\Modul::find($id);
        return view('data-modul/edit', ['modul' => $modul]);
    }
    public function update(Request $request, $id)
    {
        $modul = \App\Modul::find($id);
        $modul->update($request->all());
        return redirect('/modul')->with('sukses', 'Data berhasil di ubah');
    }
}
