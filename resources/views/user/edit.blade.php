@extends('layouts.layout')
@section('content')
<div class="main">

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit data user</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class=" form-group">
                                    <label for="exampleInputPassword1">Role</label>
                                    <select name="role" class="form-control" id="exampleInputPassword1">
                                        <option value="admin" selected>admin</option>
                                        <option value="mahasiswa" selected>mahasiswa</option>
                                    </select>
                                </div>
                                <div class=" form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="nama user" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input name="email" type="text" class="form-control" id="exampleInputPassword1 " placeholder="Email user" value="{{$user->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Upload gambar</label>
                                    <input type="file" placeholder="gambar" name="gambar" class="form-control" id="exampleInputPassword1" ">
                                    </div>

                                <div class=" modal-footer">
                                    <a href="{{ route('user') }}" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
