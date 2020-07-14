@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Nilai</h3>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Soal
                                </button>
                                <table class="table table-striped table-bordered" id="praktikum">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>id</th>
                                            <th>nama praktikum</th>
                                            <th>kode</th>
                                            <th>aktivasi</th>
                                            <th>aksi</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($praktikum as $u)

                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$u->id}}</td>
                                            <td>{{$u->nama}}</td>
                                            <td>{{$u->kode}}</td>
                                            <td>{{$u->aktif}}</td>
                                            <td>
                                                <form action="{{ route('praktikum.delete', $u->id)}}" class="d-inline">

                                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                    @csrf
                                                    <a class="btn btn-primary btn-sm" href="{{ route('praktikum.edit', $u->id) }}">Edit</a>
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
</div>
<div class="container">
    <div class="col-md-12">

    </div>
</div>
@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $('#praktikum').DataTable();
    });
</script>
@stop