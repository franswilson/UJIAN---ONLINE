<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class WaktuController extends Controller
{
    public function index()
    {
        $idlab = Auth::user()->npm;

        $waktu = DB::table('waktu')        
            ->join('modul', 'modul.id', '=', 'waktu.id_modul')
            ->join('praktikum', 'praktikum.id', '=', 'modul.id_praktikum')
            ->select('waktu.id', 'praktikum.nama', 'waktu.waktu_mulai', 'waktu.waktu_selesai', 'praktikum.aktif','modul.nama as namaModul')
            ->where('praktikum.id_lab',$idlab)
            ->get();

        // $praktikum = DB::table('praktikum')->get();

        $praktikum = \App\Modul::select('modul.*', 'praktikum.nama as namaPraktikum')
        ->join('praktikum','praktikum.id','modul.id_praktikum')
        ->where('praktikum.aktif', 1)
        ->where('praktikum.id_lab', $idlab)
        ->get();

        return view('data-waktu.waktu', compact('waktu', 'praktikum'));
    }

    public function edit($id)
    {
        $waktu = \App\Waktu::find($id);
        return view('data-waktu/edit', ['waktu' => $waktu]);
    }

    public function delete($id)
    {
        $waktu = \App\Waktu::find($id);
        $waktu->delete($waktu);
        return redirect('/waktu')->with('sukses', 'Data berhasil di hapus');
    }

    public function update(Request $request, $id)
    {
        $waktu = \App\Waktu::find($id);
        $waktu->update($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('gambar/', $request->file('gambar')->getClientOriginalName());
            $waktu->gambar =  $request->file('gambar')->getClientOriginalName();
            $waktu->save();
        }
        return redirect('/waktu')->with('sukses', 'Data berhasil di ubah');
    }
    public function create(Request $request)
    {
        \App\Waktu::create($request->all());
        return redirect('/waktu')->with('sukses', 'Data berhasil di input');
    }
}
