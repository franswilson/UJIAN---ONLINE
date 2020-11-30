<?php

namespace App\Http\Controllers;

use App\Data_soal;
use Illuminate\Http\Request;

use Session;

use App\Modul;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ModulController extends Controller
{
    public function index()
    {
      $modul = \App\Modul::all();
      return view('data-modul.modul', ['modul' => $modul]);
    }

    public function create(Request $request)
    {
        \App\Modul::create($request->all());
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
        $praktikum = \App\Praktikum::where('aktif', '=', '1')->get();
        $modul = \App\Modul::find($id);
        return view('data-modul/edit', ['modul' => $modul], compact('praktikum'));
    }
    public function update(Request $request, $id)
    {
        $modul = \App\Modul::find($id);
        $modul->update($request->all());
        return redirect('/modul')->with('sukses', 'Data berhasil di ubah');
    }
}
