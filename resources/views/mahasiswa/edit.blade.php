@extends('layouts.layout')
@section('content')
<div class="main">

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit data mahasiswa</h3>
                        </div>
                        <form action="/mahasiswa/{{$mahasiswa->id}}/update" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class=" form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="nama mahasiswa" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mahasiswa->nama}}">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">NO hp</label>
                                <input type="text" placeholder="tlp mahasiswa" name="tlp" class="form-control" id="exampleInputPassword1" value="{{$mahasiswa->tlp}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">alamat</label>
                                <input name="alamat" type="text" class="form-control" id="exampleInputPassword1 " placeholder="Alamat mahasiswa" value="{{$mahasiswa->alamat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NPM</label>
                                <input name="npm" type="text" class="form-control" id="exampleInputPassword1 " placeholder="Npm mahasiswa" value="{{$mahasiswa->npm}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Uplode gambar</label>
                                <input type="file" placeholder="gambar" name="gambar" class="form-control" id="exampleInputPassword1" ">
                                    </div>

                                <div class=" modal-footer">
                                <a href="/mahasiswa" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
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