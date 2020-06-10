@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data mahasiswa</h3>
                        </div>
                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                Tambah data
                            </button>

                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama</th>
                                        <th>tlp</th>
                                        <th>alamat</th>
                                        <th>gambar</th>
                                        <th>npm</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($data_mahasiswa as $c)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="/mahasiswa/{{$c->id}}/profile">{{ $c->nama }}</a></td>
                                        <td>{{ $c->tlp }}</td>
                                        <td>{{ $c->alamat }}</td>
                                        <td>{{ $c->npm }}</td>
                                        <td>{{ $c->gambar }}</td>

                                        <td>
                                            <form action="{{ route('mahasiswa.delete', $c->id)}}" class="d-inline">

                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                @csrf
                                                <a class="btn btn-primary btn-sm" href="{{ route('mahasiswa.edit', $c->id) }}">Edit</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
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
                                            <form action="/mahasiswa/create" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="nama mahasiswa" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="nama mahasiswa" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">alamat</label>
                                                        <input name="alamat" type="text" class="form-control" id="exampleInputPassword1 " placeholder="Alamat mahasiswa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">NO hp</label>
                                                        <input type="text" placeholder="tlp mahasiswa" name="tlp" class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">NPM</label>
                                                        <input type="text" placeholder="NPM mahasiswa" name="npm" class="form-control" id="exampleInputPassword1">
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
@endsection


@section('contain1')
<div class="container">
    <div class="row">
        <table class="table">

        </table>
    </div>
</div>


<!-- Modal -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection