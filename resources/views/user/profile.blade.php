@extends('layouts.layout')
@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="profile-main">
                                <img style="weigh:200px; height:200px;" type="image/png" src="{{$profile->foto}}" class="img-circle" alt="Avatar">

                                <h3 class="name">{{$profile->name}}</h3>
                                <span class="online-status status-available">AKTIF</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <!-- <div class="col-md-6 stat-item">
                                        <span>sebagai</span> {{$profile->role}}

                                    </div>
                                    <div>

                                    </div> -->

                                    <div class="col-md-6 stat-item">
                                        <span>npm</span>{{$profile->npm}}
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">

                        <!-- END AWARDS -->
                        <!-- TABBED CONTENT -->



                        <!-- TABLE NO PADDING -->
                        <div class="panel">
                            <div class="panel-heading">
                                
                                <h3 class="panel-title">daftar nilai</h3>
                            </div>
                            
                            <div class="col-lg-offset-4 col-lg-4 col-md-6 col-sm-12">
                            <div style="padding-left:0px; padding-right:0px; overflow-x:auto;">
                            <div class="panel-body no-padding">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>praktikum</th>
                                            <th>modul</th>
                                            <th>nama</th>
                                            <th>nilai</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($modul as $p)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$p->nama_prak}}</td>
                                            <td>{{$p->nama_mod}}</td>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->nilai}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            
                            </div>
                            </div>

                            <!-- END TABLE NO PADDING -->

                        </div>

                        <div class="tab-pane fade" id="tab-bottom-left2">
                            <div class="table-responsive">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
