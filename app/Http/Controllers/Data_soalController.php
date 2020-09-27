<?php

namespace App\Http\Controllers;

use App\Data_soal;

use Illuminate\Http\Request;

use Session;

use App\Exports\SoalExport;
use App\Imports\SoalImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


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
    public function export_excel()
	  {
	       return Excel::download(new SoalExport, 'soal.xlsx');
	  }
    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
          'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_soal di dalam folder public
        $file->move('file_soal',$nama_file);

        // import data
        Excel::import(new SoalImport, public_path('/file_soal/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses','Data Soal Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/soal');
    }
}
