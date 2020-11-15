<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Praktikum;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\NilaiExport;


class UserController extends Controller
{
    public function index()
    {
        $user = \App\User::all();
        return view('user.index', ['user' => $user]);
    }
    public function nilai()
    {
        $praktikum = \App\Praktikum::all();
        $user = \App\User::with(['praktikum'])->get();
        return view('nilai.index', ['user' => $user], compact('praktikum'));
    }


    public function profile()
    {

        $id = auth()->user()->id;
        $profile  = \App\User::find($id);
        $praktikum = \App\Praktikum::all();
        // $user = \App\User::find($id);
        return view('user.profile', ['profile' => $profile]);
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
