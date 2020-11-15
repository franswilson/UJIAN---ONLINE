@extends('layouts.layout')
@section('content')
<div class="main">

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit data soal</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/data_soal/{{$data_soal->id}}/update" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="exampleInputEmail1">Praktikum</label>
                                <select style="size:200px" name="id_praktikum" class="form-control" id="exampleInputPassword1">
                                    @foreach ($praktikum as $p)
                                    <option id="soalID" value="{{$p->id}}">{{$p->nama}}</option>

                                    @endforeach
                                </select></br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Soal</label>
                                    <textarea type="text" name="soal" class="form-control" placeholder="Isi Soal" id="exampleInputEmail1" aria-describedby="emailHelp">{{$data_soal->soal}}</textarea>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">A</label>
                                    <input type="text" name="a" class="form-control" placeholder="jawaban A" id="exampleInputEmail1" value="{{$data_soal->a}}" aria-describedby="emailHelp">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">B</label>
                                    <input name="b" type="text" class="form-control" id="exampleInputPassword1 " placeholder="jawaban B" value="{{$data_soal->b}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">C</label>
                                    <input type="text" placeholder="Jawban c" name="c" class="form-control" id="exampleInputPassword1" value="{{$data_soal->c}}">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">D</label>
                                        <input type="text" placeholder="Jawaban d" name="d" class="form-control" id="exampleInputPassword1" value="{{$data_soal->d}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">E</label>
                                        <input type="text" placeholder="Jawaban e" name="e" class="form-control" id="exampleInputPassword1" value="{{$data_soal->e}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kunci Jawaban</label>
                                        <input type="text" placeholder="Kunci jawaban" name="knc_jawaban" class="form-control" id="exampleInputPassword1" value="{{$data_soal->knc_jawaban}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Uplode gambar</label>
                                        <input type="file" placeholder="gambar" name="gambar" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class=" form-group">
                                        <label for="exampleInputPassword1">Aktivasi</label>
                                        <select name="aktif" class="form-control" id="exampleInputPassword1">
                                            <option value="Y" @if($data_soal->aktif == 'Y') selected @endif>Y</option>
                                            <option value="N" @if($data_soal->aktif == 'N') selected @endif>N</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/data_soal" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                        <button type="submit" class="btn btn-primary">update</button>
                                    </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-12">

    </div>
</div>
@endsection