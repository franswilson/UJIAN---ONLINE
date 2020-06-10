<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Data_soalController extends Controller
{
    public function index()
    {
        $data_soal = \App\Data_soal::all();
        return view('data-soal.data_soal', ['data_soal' => $data_soal]);
    }

    public function create(Request $request)
    {
        \App\Data_soal::create($request->all());
        return redirect('/data_soal')->with('sukses', 'Data berhasil di input');
    }

    public function delete($id)
    {
        $data_soal = \App\Data_soal::find($id);
        $data_soal->delete($data_soal);
        return redirect('/data_soal')->with('sukses', 'Data berhasil di hapus');
    }
    public function edit($id)
    {
        $data_soal = \App\Data_soal::find($id);
        return view('data-soal/edit', ['data_soal' => $data_soal]);
    }
    public function update(Request $request, $id)
    {
        $data_soal = \App\Data_soal::find($id);
        $data_soal->update($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('gambar/', $request->file('gambar')->getClientOriginalName());
            $data_soal->gambar =  $request->file('gambar')->getClientOriginalName();
            $data_soal->save();
        }
        return redirect('/data_soal')->with('sukses', 'Data berhasil di ubah');
    }
}
