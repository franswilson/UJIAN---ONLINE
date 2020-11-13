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
                            <div class="col-3 col-sm-3 col-md-3">
                                <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><img src="{{asset('admin/assets/img/box-user.png')}}" style="weight: 25px; height: 35px"></span>
                                
                                <div class="info-box-content">
                                    <span class="info-box-text">User Praktikan</span>
                                    <span class="info-box-number">
                                    <?= $userPraktikan ?>
                                    <small>mahasiswa</small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-3 col-sm-3 col-md-3">
                                <div class="info-box mb-3 ">
                                <span class="info-box-icon bg-danger elevation-1"><img src="{{asset('admin/assets/img/box-user.png')}}" style="weight: 25px; height: 35px"></span>

                                <div class="info-box-content ">
                                    <span class="info-box-text">praktikum</span>
                                    <span class="info-box-number"><?=$jumlahPraktikum ?></span>
                                </div>
                                <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->

                            <div class="col-3 col-sm-3 col-md-3">
                                <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><img src="{{asset('admin/assets/img/box-user.png')}}" style="weight: 25px; height: 35px"></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">jumlah soal</span>
                                    <span class="info-box-number"><?=$jumlahSoal ?></span>
                                </div>
                                <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-3 col-sm-3 col-md-3">
                                <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><img src="{{asset('admin/assets/img/box-user.png')}}" style="weight: 25px; height: 35px"></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">jumlah Aslab</span>
                                    <span class="info-box-number"><?=$userAslab ?></span>
                                </div>
                                <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            </div>

                        <select style="width:200px; margin-left:27px;margin-top:20px;" name="praktikum" class="form-control" id="exampleInputPassword1">
                                      @foreach ($praktikum as $p)
                                      <option id ="soalID" value="{{$p->id}}">{{$p->nama}}</option>
                                      @endforeach
                                  </select>

                        <button type="submit" class="btn btn-success float-right">Download</button>

                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <script type="text/javascript" language="javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        <script type="text/javascript">
                                window.onload = function () {
                                
                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    title:{
                                        text: "Laporan Data Praktikum"
                                    },
                                    axisY: {
                                        title: "Jumlah Siswa",
                                    },
                                    data: [{
                                        type: "spline",
                                        markerSize: 5,
                                        dataPoints: <?php echo json_encode($list, JSON_NUMERIC_CHECK); ?>
                                    }]
                                });
                                
                                chart.render();
                                
                                }
                                </script>
                        @endif
                        @if(auth()->user()->role == 'mahasiswa')
                        
                            </div>
                                <div class="panelbox">
                                <div class="text-center ">
                                <h1><b>PERATURAN PRETEST :</b></h1>
                                <center><h4>
                                    1. kerjakan soal sampai waktu yang di tentukan
                                    <br>
                                    2. kerjakan secara individu
                                    <br>
                                    3. cek nilai pada menu my profil
                                    </h4></center>
                                </div>
                            
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
