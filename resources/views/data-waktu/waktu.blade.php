@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <!-- <div class="panel-heading">
                            <h3 class="panel-title">Data waktu ujian</h3>
                        </div> -->
                        <div class="panel-body">
                            @if(session('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{session('sukses')}}
                            </div>
                            @endif

                            <div class="col-6">
                                <button style="margin-top:10px; margin-left:25px;margin-bottom:1px;" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Praktikum
                                </button>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="waktu">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>waktu mulai</th>
                                            <th>waktu selesai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($waktu as $c)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$c->namaModul}} - {{$c->nama}}</td>
                                            @if(is_null($c->waktu_mulai))
                                                <td></td>
                                            @else
                                                <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_mulai))->format('d F Y')}} Pukul {{\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_mulai))->format('H:i')}} WIB</td>
                                            @endif
                                            @if(is_null($c->waktu_selesai))
                                                <td></td>
                                            @else
                                                <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_selesai))->format('d F Y')}} Pukul {{\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_selesai))->format('H:i')}} WIB</td>
                                            @endif
                                            @if(is_null($c->waktu_selesai) || is_null($c->waktu_mulai))
                                                <td></td>
                                            @else
                                                @if((\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_mulai))->isPast()) and !(\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_selesai))->isPast()))
                                                    <td> Sedang Mulai </td>
                                                @elseif(!(\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_mulai))->isPast()) and !(\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_selesai))->isPast()))
                                                    <td> Belum Mulai </td>
                                                @elseif((\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_mulai))->isPast()) and (\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_selesai))->isPast()))
                                                    <td> Sudah Selesai </td>
                                                @else
                                                    <td></td>
                                                @endif
                                            @endif
                                            <td>
                                                <form>
                                                    @csrf
                                                    <a class="btn btn-primary btn-lg  lnr lnr-pencil" href="{{ route('waktu.edit', $c->id) }}"></a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach </tbody>
                                </table>


                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Menambahkan Data Praktikum</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('waktu.create') }}" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <select name="id_modul" class="form-control" id="exampleInputPassword1">
                                                            @foreach ($praktikum as $p)
                                                            <option id="soalID" value="{{$p->id}}">{{$p->nama}} - {{$p->namaPraktikum}}</option>

                                                            @endforeach
                                                        </select></br></br>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                                        </div>
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
        $('#waktu').DataTable();
    });
</script>
@stop
