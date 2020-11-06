<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = \App\User::where(Auth()->user()->name);
        $praktikum = \App\Praktikum::all();
        return view('nilai.index', ['nilai' => $nilai],compact('praktikum'));
    }

    public function praktikum()
    {
        $praktikum = \App\Praktikum::all();
        // dd($praktikum);
        return view('data-praktikum.praktikum', ['praktikum' => $praktikum]);
    }


    public function create(Request $request)
    {
        \App\Praktikum::create($request->all());
        return redirect('/praktikum')->with('sukses', 'Data berhasil di input');
    }

    public function delete($id)
    {
        $praktikum = \App\Praktikum::find($id);
        $praktikum->delete($praktikum);
        return redirect('/praktikum')->with('sukses', 'Data berhasil di hapus');
    }
    public function edit($id)
    {
        $praktikum = \App\Praktikum::find($id);
        return view('data-praktikum/edit', ['praktikum' => $praktikum]);
    }
    public function update(Request $request, $id)
    {
        $praktikum = \App\Praktikum::find($id);
        $praktikum->update($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('gambar/', $request->file('gambar')->getClientOriginalName());
            $praktikum->gambar =  $request->file('gambar')->getClientOriginalName();
            $praktikum->save();
        }
        return redirect('/praktikum')->with('sukses', 'Data berhasil di ubah');
    }
}
