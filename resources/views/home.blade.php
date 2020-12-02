@extends('layouts/layout')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                        <center>SILAHKAN UNTUK 
                        <button><a href="{{ route('mahasiswa.profile') }}"><i class="lnr"></i> <span>CEK NILAI</span></a></button></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
