@extends('layouts.layout')
@section('content')

<!-- Theme style -->

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading" >

                        @if(auth()->user()->role == 'admin')

                        <div class="row">
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-user"></i></span>
                                    <p>
                                        <span class="number"><?= $userPraktikan ?></span>
                                        <span class="title">Praktikan</span></br>
                                        <a href=#>More Info</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-file"></i></span>
                                    <p>
                                        <span class="number"><?=$jumlahSoal ?></span>
                                        <span class="title">Soal</span></br>
                                        <a href="{{ route('data_soal') }}">More Info</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-book"></i></span>
                                    <p>
                                        <span class="number"><?=$jumlahPraktikum ?></span>
                                        <span class="title">Praktikum</span></br>
                                        <a href="{{ route('praktikum') }}">More Info</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-user-circle-o"></i></span>
                                    <p>
                                        <span class="number"><?=$userAslab?></span>
                                        <span class="title">Aslab Aktif</span></br>
                                        <a href=#>More Info</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- <button type="submit" class="btn btn-success float-right">Download</button> -->

                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <script type="text/javascript" language="javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        <script type="text/javascript">
                                window.onload = function () {

                                // var chart = new CanvasJS.Chart("chartContainer", {
                                //     animationEnabled: true,
                                //     title:{
                                //         text: "Laporan Data Praktikum"
                                //     },
                                //     axisY: {
                                //         title: "Jumlah Praktikan",
                                //     },
                                //     axisX: {
                                //         title: "Tahun",
                                //     },
                                //     data: [{
                                //         type: "spline",
                                //         markerSize: 5,
                                //         dataPoints: <?php //echo json_encode($list, JSON_NUMERIC_CHECK); ?>
                                //     }]
                                // });

                                // chart.render();

                                }
                                </script>
                        @endif
                        @if(auth()->user()->role == 'mahasiswa')

                            </div>
                                <div class="panelbox" style="padding: 20px; margin:30px;">
                                <div class="text-center ">
                                <h1><b>PERATURAN PRETEST :</b></h1><br>
                                <center><h4>
                                    1. kerjakan soal sampai waktu yang di tentukan
                                    <br><br>
                                    2. kerjakan secara individu
                                    <br><br>
                                    3. cek nilai pada menu my profil
                                    </h4></center>
                                </div>

                        </div>

                        <center><div class="panel-body">
                        
                          <label for="exampleInputPassword1">Waktu Praktikum</label>
                          <div style="overflow-x:auto;">
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
                                        @if(!(\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_selesai))->isPast()))
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$c->nama}} - {{ $c->namaModul }}</td>
                                                <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_mulai))->format('d F Y')}} Pukul {{\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_mulai))->format('H:i')}} WIB</td>
                                                <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_selesai))->format('d F Y')}} Pukul {{\Carbon\Carbon::createFromTimeStamp(strtotime($c->waktu_selesai))->format('H:i')}} WIB</td>
                                            </tr>
                                        @endif
                                    @endforeach </tbody>
                            </table>
                           <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4" style="text-align:center;">
                                    @if(session('gagal'))
                                        <div class="alert alert-danger" role="alert">
                                            {{session('gagal')}}
                                        </div>
                                    @endif
                                    <form id="post-data" method="post" action="{{ route('idSoal') }}">
                                        {{ csrf_field() }}
                                        <select style="min-width: 320px;margin:0 auto;" name="modul" class="form-control" id="exampleInputPassword1">
                                            @foreach ($modul as $m)
                                                @if((\Carbon\Carbon::createFromTimeStamp(strtotime($m->waktu_mulai))->isPast()) and !(\Carbon\Carbon::createFromTimeStamp(strtotime($m->waktu_selesai))->isPast()))
                                                    <option id ="soalID" value="{{$m->idModul}}"> {{ $m->namaPraktikum }} - {{$m->nama}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <br>
                                        <input type="text" class="form-control" placeholder="Masukkan Password jika ada" name="password">
                                        <br>
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">START</button>
                                        </div>
                                    </form>
                                </div>
                              </form>
                            </div>
                        </div>

                        @endif
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
