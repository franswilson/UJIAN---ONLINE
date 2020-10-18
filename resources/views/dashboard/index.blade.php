@extends('layouts/layout')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="text-center">
                                <h1>PERATURAN PRETEST :</h1>
                            </div>
                            <h4>
                                1. kerjakan soal sampai waktu yang di tentukan
                                <br>
                                2. kerjakan secara individu
                                <br>
                                3. cek nilai pada menu my profil
                            </h4>
                        </div>

                        <div class="panel-body">
                          <label for="exampleInputPassword1">Waktu Praktikum</label>
                            <table class="table table-striped table-bordered" id="waktu">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Praktikum</th>
                                        <th>waktu mulai</th>
                                        <th>waktu selesai</th>
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
                                    </tr>
                                    @endforeach </tbody>
                            </table>
                        </div>

                        <div class=" form-group">

                            <div class="col-md-12">
                              <form id="post-data" method="post" action="{{ route('idSoal') }}">
                                {{ csrf_field() }}
                                <label for="exampleInputPassword1">Pilih Praktikum</label>
                                <select name="praktikum" class="form-control" id="exampleInputPassword1">
                                    @foreach ($praktikum as $p)
                                    <option id ="soalID" value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary btn-lg">START</button>
                                    <!-- <a href='/soal'>START</a> -->
                                </div>
                              </form>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
                            <script src="{{ asset('js/post.js') }}" type="text/javascript">

                            </script>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
