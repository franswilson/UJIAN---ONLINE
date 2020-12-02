@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit data modul</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('modul.update',$modul->id) }}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">nama modul</label>
                                    <textarea type="text" name="nama" class="form-control" placeholder="nama" id="exampleInputEmail1" aria-describedby="emailHelp">{{$modul->nama}}</textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">id modul</label>
                                    <textarea type="text" name="id" class="form-control" placeholder="id" id="exampleInputEmail1" aria-describedby="emailHelp">{{$modul->id}}</textarea>
                                </div> -->
                                <div class=" form-group">
                                    <label for="exampleInputPassword1">Aktivasi</label>
                                    <select style="width: 100px" name="aktif" class="form-control" id="exampleInputPassword1">
                                        <option value="1" @if($modul->aktif == 1) selected @endif>aktif</option>
                                        <option value="0" @if($modul->aktif == 0) selected @endif>non aktif</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('modul') }}" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
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
