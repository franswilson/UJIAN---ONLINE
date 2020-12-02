@extends('layouts.layout')
@section('content')
<div class="main">

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit data waktu ujian</h3>
                        </div>
                        <!-- <div class="panel-body">
                            <form action="/waktu/{{$waktu->id}}/update" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="waktu">Birthday (date and time):</label>
                                <input type="datetime-local" id="waktu_mulai" name="waktu_mulai">
                                <input type="submit">
                            </form>
                            </form>
                        </div> -->
                        <div class="panel-body">
                            *Jika <b>Date Time Picker</b> tidak muncul gunakan Browser Chrome, Edge, Opera
                            <form action="{{ route('waktu.update',$waktu->id) }}" method="POST" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <text for="waktu">waktu mulai saat ini = </text>
                                    {{$waktu->waktu_mulai}}</input>
                                    <br>

                                    <label for="waktu">waktu mulai ujian : </label>
                                    <input type="text" data-field="datetime" name="waktu_mulai" readonly>
                                </div>

                                <br>
                                <div class="form-group">
                                    <text for="waktu">waktu selesai saat ini = </text>
                                    {{$waktu->waktu_selesai}}</input>

                                    <br>
                                    <label for="waktu">waktu selesai ujian : </label>
                                    <input type="text" data-field="datetime" name="waktu_selesai">

                                    <div id="dtBox"></div>

                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('waktu') }}" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
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
<div class="container">
    <div class="col-md-12">

    </div>
</div>
@endsection
