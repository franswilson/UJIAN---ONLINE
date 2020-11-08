<?php

namespace App\Http\Controllers;

use App\Data_soal;
use Illuminate\Http\Request;

use Session;

use App\Exports\SoalExport;
use App\Imports\SoalImport;
use App\Praktikum;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class Data_soalController extends Controller
{
    public function index()
    {
        $praktikum = \App\Praktikum::all();

        $data_soal = DB::table('tbl_soal')
        ->join('praktikum', 'praktikum.id','=','tbl_soal.id_praktikum')
        ->select('tbl_soal.id', 'tbl_soal.soal', 'tbl_soal.a', 'tbl_soal.b', 'tbl_soal.c', 'tbl_soal.d', 'tbl_soal.e', 'tbl_soal.knc_jawaban',
         'tbl_soal.gambar', 'tbl_soal.aktif', 'tbl_soal.soal', 'praktikum.nama')->get();

        return view('data-soal.data_soal',compact('praktikum','data_soal'));
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

    // public function deleteall(Request $request)
    // {
    //     $ids = $request->get('ids');
    //     \DB::table("tbl_soal")->whereIn('id', explode(",", $ids))->delete();
    //     return redirect('/data_soal')->with('sukses', 'Data berhasil di hapus');
    // }
    public function destroy(Request $request, $id)
    {
        $c = Data_soal::find($id);
        $c->delete();
        return back()->with('success', 'Product deleted successfully');
    }
    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Data_soal::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' => "Product deleted successfully."]);
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
    public function export_excel(Request $request)
    {
        $idPrak = $request->praktikum;
        $prak =  Praktikum::where('id','=',$idPrak)->select('nama')->first();
        return Excel::download(new SoalExport($idPrak), "Soal Praktikum " .$prak->nama. ".xlsx");
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
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_soal di dalam folder public
        $file->move('file_soal', $nama_file);

        // import data
        Excel::import(new SoalImport, public_path('/file_soal/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Soal Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/soal');
    }
}
