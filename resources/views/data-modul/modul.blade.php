@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Modul</h3>
                        </div>
                        <div class="panel-body">
                            @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{session('sukses')}}
                                </div>
                            @endif
                            <button style="margin-top:10px; margin-bottom:20px;" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                Tambah Modul
                            </button>
                            <table class="table table-striped table-bordered" id="modul">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Modul</th>
                                        <th>Id Modul</th>
                                        <th>Praktikum</th>
                                        <th>Password Kuis</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        <!-- <th>aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($modul as $u)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$u->nama}}</td>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->namaPraktikum}}</td>
                                        <td>{{$u->password}}</td>
                                        <td>@if($u->aktif == 1)
                                            <span class="label label-success"> aktif</span>
                                            @else
                                            <span class="label label-warning">non aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('modul.delete', $u->id)}}" class="d-inline">

                                                <button class="btn btn-danger btn-sm lnr lnr-trash" type="submit"></button>
                                                @csrf
                                                <a class="btn btn-primary btn-sm  lnr lnr-pencil" href="{{ route('modul.edit', $u->id) }}"></a>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Menambahkan Data Modul</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('modul.create') }}" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Modul</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="nama praktikum" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Praktikum</label>
                                                    <select class="form-control" name="idpraktikum">
                                                        <option disabled selected>Pilih Praktikum</option>
                                                        @foreach($praktikum as $p)
                                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                                        <button type="submit" class="btn btn-primary">Tambah</button>
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
