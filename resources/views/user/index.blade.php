@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data user</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-6">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                    Tambah data
                                </button>

                            </div>
                            @if(session('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{session('sukses')}}
                            </div>
                            @endif

                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>role</th>
                                            <th>nama</th>
                                            <th>email</th>
                                            <th>password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($user as $c)
                                        <tr>
                                            <td>{{$i++}}</td>

                                            <td>{{ $c->role }}</td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->email }}</td>
                                            <td>{{ $c->password }}</td>
                                            <td>
                                                <form action="{{ route('user.delete', $c->id)}}" class="d-inline">

                                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                    @csrf
                                                    <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $c->id) }}">Edit</a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach </tbody>
                                </table>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/user/create" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama</label>
                                                        <input type="text" name="nama" class="form-control" placeholder="nama user" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">alamat</label>
                                                        <input name="alamat" type="text" class="form-control" id="exampleInputPassword1 " placeholder="Alamat user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">NO hp</label>
                                                        <input type="text" placeholder="tlp user" name="tlp" class="form-control" id="exampleInputPassword1">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    $(document).ready(function() {
        $('#tbl').DataTable();
    });
</script>
@stop