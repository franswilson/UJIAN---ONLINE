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

                            <div class="text-center">
                                <a href="/soal" type="button" class="btn btn-primary btn-lg" data-dismiss="modal">START</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection