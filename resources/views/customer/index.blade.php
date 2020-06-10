@extends('layouts.layout')
@section('content')
<div class="main">

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Customer</h3>
                        </div>
                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                Tambah data
                            </button>

                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama</th>
                                        <th>alamat</th>
                                        <th>tlp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($data_customer as $c)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $c->nama }}</td>
                                        <td>{{ $c->alamat }}</td>
                                        <td>{{ $c->tlp }}</td>
                                        <td>
                                            <form action="{{ route('customer.delete', $c->id)}}" class="d-inline">

                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                @csrf
                                                <a class="btn btn-primary btn-sm" href="{{ route('customer.edit', $c->id) }}">Edit</a>
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
                                            <form action="/customer/create" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="nama customer" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">alamat</label>
                                                    <input name="alamat" type="text" class="form-control" id="exampleInputPassword1 " placeholder="Alamat customer">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">NO hp</label>
                                                    <input type="text" placeholder="tlp customer" name="tlp" class="form-control" id="exampleInputPassword1">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                                    <button type="submit" class="btn btn-primary">tambah</button>
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
@endsection