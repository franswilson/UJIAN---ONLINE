@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data waktu ujian</h3>
                        </div>
                        <div class="panel-body">
                            @if(session('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{session('sukses')}}
                            </div>
                            @endif
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="waktu">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>waktu mulai</th>
                                            <th>waktu selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($waktu as $c)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$c->nama}}</td>
                                            <td>{{$c->waktu_mulai}}</td>
                                            <td>{{$c->waktu_selesai}}</td>
                                            <td>
                                                <form>
                                                    @csrf
                                                    <a class="btn btn-primary btn-lg  lnr lnr-pencil" href="{{ route('waktu.edit', $c->id) }}"></a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach </tbody>
                                </table>
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
