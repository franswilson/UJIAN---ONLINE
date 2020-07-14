<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = \App\Mahasiswa::all();
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    public function create(Request $request)
    {

        //insert ke tabel user
        $user = new \App\User;
        $user->role = 'mahasiswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->remember_token = str_random(60);
        $user->save();

        // insert ke tabel mahasiswa
        $request->request->add(['user_id' => $user->id]);
        $mahasiswa = \App\Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil di input');
    }
    public function edit($id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        return view('mahasiswa/edit', ['mahasiswa' => $mahasiswa]);
    }
    public function update(Request $request, $id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('gambar/', $request->file('gambar')->getClientOriginalName());
            $mahasiswa->gambar =  $request->file('gambar')->getClientOriginalName();
            $mahasiswa->save();
        }

        return redirect('/mahasiswa')->with('sukses', 'Data berhasil di ubah');
    }
    public function delete($id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        $mahasiswa->delete($mahasiswa);
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil di hapus');
    }

    public function profile($id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        return view('mahasiswa.profile', ['mahasiswa' => $mahasiswa]);
    }
}
