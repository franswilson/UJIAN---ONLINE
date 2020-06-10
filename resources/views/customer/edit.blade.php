@extends('layouts.layout')
@section('content')
<div class="main">

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit data customer</h3>
                        </div>
                        <form action="/customer/{{$customer->id}}/update" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="nama customer" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$customer->nama}}">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">alamat</label>
                                <input name="alamat" type="text" class="form-control" id="exampleInputPassword1 " placeholder="Alamat customer" value="{{$customer->alamat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NO hp</label>
                                <input type="text" placeholder="tlp customer" name="tlp" class="form-control" id="exampleInputPassword1" value="{{$customer->tlp}}">
                            </div>

                            <div class="modal-footer">
                                <a href="/customer" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
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