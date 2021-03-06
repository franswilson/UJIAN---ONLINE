@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel">
                        <!-- <div class="panel-heading">
                            <h3 class="panel-title">Nilai</h3>
                        </div> -->
                        <form id="post-data" method="post" action="{{ route('idPraktikum') }}">
                        {{ csrf_field() }}
                        <select style="width:200px; margin-top:20px; margin-left:50px" name="praktikum" class="form-control" id="exampleInputPassword1">
                            @foreach ($praktikum as $p)
                            <option id ="soalID" value="{{$p->id}}">{{$p->nama}}</option>

                            @endforeach
                        </select>
                        <button style="float:right; margin-top:-35px; margin-right:600px;"type="submit" class="btn btn-success float-right">Download</button>

                      </form>
                        <div class=" panel-body ">
                            <div style="padding-left:0px; padding-right:0px;" class="panel-body col-lg-offset-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="col-lg-offset-4 col-lg-4 col-md-6 col-sm-12">
                                <div style="overflow-x:auto;">
                                <table class="table table-striped table-bordered" id="nilai">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Praktikum</th>
                                            <th>Modul</th>
                                            <th>Nama</th>
                                            <th>Nilai</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($nilai as $n)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$n->nama_prak}}</td>
                                            <td>{{$n->nama_mod}}</td>
                                            <td>{{$n->nama}}</td>
                                            <td>{{$n->nilai}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                </div>
                                </div>

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
                                                <form action="{{ route('mahasiswa.create') }}" method="POST">
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
@endsection
@section('footer')
<script>
    $(document).ready(function() {
        $('#nilai').DataTable();
    });
</script>
@stop
