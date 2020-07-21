@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit data pretest</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/praktikum/{{$praktikum->id}}/update" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">nama</label>
                                    <textarea type="text" name="nama" class="form-control" placeholder="nama" id="exampleInputEmail1" aria-describedby="emailHelp">{{$praktikum->nama}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">kode</label>
                                    <textarea type="text" name="kode" class="form-control" placeholder="kode" id="exampleInputEmail1" aria-describedby="emailHelp">{{$praktikum->kode}}</textarea>
                                </div>
                                <div class=" form-group">
                                    <label for="exampleInputPassword1">Aktivasi</label>
                                    <select name="aktif" class="form-control" id="exampleInputPassword1">
                                        <option value="Y" @if($praktikum->aktif == 'Y') selected @endif>Y</option>
                                        <option value="N" @if($praktikum->aktif == 'N') selected @endif>N</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <a href="/praktikum" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
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