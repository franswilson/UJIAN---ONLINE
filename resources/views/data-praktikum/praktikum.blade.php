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
                            <div class="col-6">
                                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Soal
                                </button>

                            </div>
                            @if(session('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{session('sukses')}}
                            </div>
                            @endif
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="praktikum">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>nama praktikum</th>
                                            <th>aktif</th>
                                            <th>aksi</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($praktikum as $u)

                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$u->nama}}</td>
                                            <td><span class="label label-warning">{{$u->aktif}}</span></td>
                                            <td>
                                                <form action="{{ route('praktikum.delete', $u->id)}}" class="d-inline">

                                                    <button class="btn btn-danger btn-sm lnr lnr-trash" type="submit"></button>
                                                    @csrf
                                                    <a class="btn btn-primary btn-sm  lnr lnr-pencil" href="{{ route('praktikum.edit', $u->id) }}"></a>
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
                                                <form action="praktikum/create" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama</label>
                                                        <input type="text" name="nama" class="form-control" placeholder="nama praktikum" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">kode</label>
                                                            <input type="text" name="kode" class="form-control" placeholder="kode praktikum" id="exampleInputEmail1" aria-describedby="emailHelp">

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
