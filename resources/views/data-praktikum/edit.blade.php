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
                            <form action="{{ route('praktikum.update',{{$praktikum->id}}) }}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">nama praktikum</label>
                                    <textarea type="text" name="nama" class="form-control" placeholder="nama" id="exampleInputEmail1" aria-describedby="emailHelp">{{$praktikum->nama}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">id praktikum</label>
                                    <textarea type="text" name="id" class="form-control" placeholder="id" id="exampleInputEmail1" aria-describedby="emailHelp">{{$praktikum->id}}</textarea>
                                </div>
                                <div class=" form-group">
                                    <label for="exampleInputPassword1">Aktivasi</label>
                                    <select style="width: 60px" name="aktif" class="form-control" id="exampleInputPassword1">
                                        <option value="Y" @if($praktikum->aktif == 1) selected @endif>aktif</option>
                                        <option value="N" @if($praktikum->aktif == 0) selected @endif>non aktif</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('praktikum') }}" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
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
