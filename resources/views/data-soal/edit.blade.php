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
                            <form action="{{ route('data_soal.update',$data_soal->id) }}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Soal</label>
                                    <textarea type="text" name="soal" class="form-control" placeholder="Isi Soal" id="exampleInputEmail1" aria-describedby="emailHelp" rows="5">{{$data_soal->soal}}</textarea>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">A</label>
                                    <textarea type="text" name="a" class="form-control" placeholder="jawaban A" rows="5">{{$data_soal->a}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">B</label>
                                    <textarea type="text" name="b" class="form-control" placeholder="jawaban B" rows="5">{{$data_soal->b}}</textarea>
                                    <!--<input name="b" type="text" class="form-control" id="exampleInputPassword1 " placeholder="jawaban B" value="{{$data_soal->b}}">-->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">C</label>
                                    <!--<input type="text" placeholder="Jawban c" name="c" class="form-control" id="exampleInputPassword1" value="{{$data_soal->c}}">-->
                                    <textarea type="text" name="c" class="form-control" placeholder="jawaban C" rows="5">{{$data_soal->c}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">D</label>
                                        <textarea type="text" name="d" class="form-control" placeholder="jawaban D" rows="5">{{$data_soal->d}}</textarea>
                                        <!--<input type="text" placeholder="Jawaban d" name="d" class="form-control" id="exampleInputPassword1" value="{{$data_soal->d}}">-->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">E</label>
                                        <textarea type="text" name="e" class="form-control" placeholder="jawaban E" rows="5">{{$data_soal->e}}</textarea>
                                        <!--<input type="text" placeholder="Jawaban e" name="e" class="form-control" id="exampleInputPassword1" value="{{$data_soal->e}}">-->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kunci Jawaban</label>
                                        <!-- <input type="text" placeholder="Kunci jawaban" name="knc_jawaban" class="form-control" id="exampleInputPassword1" value="{{$data_soal->knc_jawaban}}"> -->
                                        <select class="form-control" name="knc_jawaban">
                                            <option value="a" {{ $data_soal->knc_jawaban == "a" ? 'selected' : '' }}>A</option>
                                            <option value="b" {{ $data_soal->knc_jawaban == "b" ? 'selected' : '' }}>B</option>
                                            <option value="c" {{ $data_soal->knc_jawaban == "c" ? 'selected' : '' }}>C</option>
                                            <option value="d" {{ $data_soal->knc_jawaban == "d" ? 'selected' : '' }}>D</option>
                                            <option value="e" {{ $data_soal->knc_jawaban == "e" ? 'selected' : '' }}>E</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Upload gambar</label>
                                        <input type="file" placeholder="gambar" name="gambar" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class=" form-group">
                                        <label for="exampleInputPassword1">Aktivasi</label>
                                        <select name="aktif" class="form-control" id="exampleInputPassword1">
                                            <option value="1" @if($data_soal->aktif == '1') selected @endif>Aktif</option>
                                            <option value="0" @if($data_soal->aktif == '0') selected @endif>Non Aktif</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('data_soal') }}" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
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
