@extends('layouts.layout')
@section('content')



<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <!-- <div class="panel-heading">
                            <h3 class="panel-title">Data Login</h3>
                        </div> -->
                        <div class="panel-body-dataLogin">
                            <div class="col-6">
                                <!-- Button trigger modal -->
                                <!--<button style="margin-top:25px; margin-left:25px;" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">-->
                                <!--    Tambah data-->
                                <!--</button>-->

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
                                            <th>npm</th>
                                            <!--<th>password</th>-->
                                            <!--<th>Aksi</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($user as $c)
                                        <tr>
                                            <td>{{$i++}}</td>

                                            <td>{{ $c->role }}</td>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->npm }}</td>
                                            <!--<td>{{ $c->password }}</td>-->
                                            <!--<td>-->
                                            <!--    <form action="{{ route('user.delete', $c->id)}}" class="d-inline">-->

                                            <!--        <button class="btn btn-danger btn-sm lnr lnr-trash" type="submit"></button>-->
                                            <!--        @csrf-->
                                            <!--        <a class="btn btn-primary btn-sm  lnr lnr-pencil" href="{{ route('user.edit', $c->id) }}"></a>-->
                                            <!--    </form>-->
                                            <!--</td>-->
                                        </tr>
                                        @endforeach </tbody>
                                </table>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Menambahkan Data Login</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user.create') }}" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama</label>
                                                        <input type="text" name="name" class="form-control" placeholder="nama " id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">password</label>
                                                        <input type="text" name="password" class="form-control" placeholder="password" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">email</label>
                                                        <input type="text" name="email" class="form-control" placeholder="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class=" form-group">
                                                        <label for="exampleInputPassword1">Role</label>
                                                        <select name="role" class="form-control" id="exampleInputPassword1">
                                                            <option value="admin" selected>admin</option>
                                                            <option value="mahasiswa" selected>mahasiswa</option>
                                                        </select>
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
