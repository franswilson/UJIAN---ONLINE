<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaktuController extends Controller
{
    public function index()
    {

        $waktu = DB::table('waktu')
            ->join('praktikum', 'praktikum.id', '=', 'waktu.id_praktikum')
            ->select('waktu.id', 'praktikum.nama', 'waktu.waktu_mulai', 'waktu.waktu_selesai', 'praktikum.aktif')->get();

        $praktikum = DB::table('praktikum')->get();

        return view('data-waktu.waktu', compact('waktu', 'praktikum'));
    }

    public function edit($id)
    {
        $praktikum = \App\Praktikum::where('aktif', '=', 'Y')->get();
        $waktu = \App\Waktu::find($id);
        return view('data-waktu/edit', ['waktu' => $waktu], compact('praktikum'));
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
