@extends('layouts.layout')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <!-- <div class="panel-heading">
                            <h3 class="panel-title">Data soal</h3>
                        </div> -->
                        <div class="panel-body">
                            <div class="col-6">

                                {{-- notifikasi form validasi --}}
                                @if ($errors->has('file'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                                @endif

                                {{-- notifikasi sukses --}}
                                @if ($sukses = Session::get('sukses'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $sukses }}</strong>
                                </div>
                                @endif
                                <form id="post-data" method="post" action="{{ route('idPrak') }}">

                                    {{ csrf_field() }}
                                    <select style="width:200px; margin-left:27px;margin-top:20px" name="praktikum" class="form-control" id="exampleInputPassword1">
                                        @foreach ($praktikum as $p)
                                        <option id="soalID" value="{{$p->id}}">{{$p->nama}}</option>
                                        @endforeach
                                    </select>
                                    <button style="margin-top:-55px;margin-left:245px; margin-right:60px" type="submit" class="btn btn-success float-right">Download</button>
                                    <button style="margin-top: -55px; margin-left:-45px" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                        Tambah Soal
                                    </button>
                                    <button style=" margin-top: -55px; margin-left:13px" type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#importExcel">
                                        Upload Soal
                                    </button>
                                    <br>
                                    <br>
                                    <br>

                                </form>

                                <button style="margin: 5px; margin-left:30px" class="btn btn-danger btn-bg delete-all" data-url="">Delete All</button>


                                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post" action="/soal/import_excel" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                                </div>
                                                <div class="modal-body">

                                                    {{ csrf_field() }}

                                                    <label>Pilih file excel</label>
                                                    <div class="form-group">
                                                        <input type="file" name="file" required="required">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Import</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="panel-body">

                                <table class="table table-striped table-bordered" id="soal">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="check_all"></th>
                                            <th>No </th>
                                            <th>soal</th>
                                            <th>a</th>
                                            <th>b</th>
                                            <th>c</th>
                                            <th>d</th>
                                            <th>e</th>
                                            <th>kunci</th>
                                            <th>gambar</th>
                                            <th>praktikum</th>
                                            <th>status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($data_soal as $c)

                                        <tr id="tr_{{$c->id}}">
                                            <td><input type="checkbox" class="checkbox" data-id="{{$c->id}}"></td>
                                            <td>{{$i++}}</td>
                                            <td>{{ $c->soal }}</td>
                                            <td>{{ $c->a }}</td>
                                            <td>{{ $c->b }}</td>
                                            <td>{{ $c->c }}</td>
                                            <td>{{ $c->d }}</td>
                                            <td>{{ $c->e }}</td>
                                            <td>{{ $c->knc_jawaban }}</td>
                                            <td>{{ $c->gambar }}</td>
                                            <td>{{ $c->nama }}</td>
                                            <td>@if($c->aktif == 'Y')
                                                <span class="label label-success"> aktif</span>
                                                @else
                                                <span class="label label-warning">non aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('data_soal.delete', $c->id)}}" class="d-inline">

                                                    <button class="btn btn-danger btn-sm lnr lnr-trash" type="submit"></button>
                                                    @csrf
                                                    <a class="btn btn-primary btn-sm  lnr lnr-pencil" href="{{ route('data_soal.edit', $c->id) }}"></a>
                                                </form>
                                            </td>

                                        </tr>


                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/data_soal/create" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Id Praktikum</label>
                                                        <input type="text" name="id_praktikum" class="form-control" placeholder="id_praktikum" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Soal</label>
                                                        <textarea type="text" name="soal" class="form-control" placeholder="Isi Soal" rows="4"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">A</label>
                                                        <input type="text" name="a" class="form-control" placeholder="jawaban A" id="exampleInputEmail1" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">B</label>
                                                        <input name="b" type="text" class="form-control" id="exampleInputPassword1 " placeholder="jawaban B">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">C</label>
                                                        <input type="text" placeholder="Jawban c" name="c" class="form-control" id="exampleInputPassword1">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">D</label>
                                                            <input type="text" placeholder="Jawaban d" name="d" class="form-control" id="exampleInputPassword1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">E</label>
                                                            <input type="text" placeholder="Jawaban e" name="e" class="form-control" id="exampleInputPassword1">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Kunci Jawaban</label>
                                                            <input type="text" placeholder="Kunci jawaban" name="knc_jawaban" class="form-control" id="exampleInputPassword1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Upload gambar</label>
                                                            <input type="file" placeholder="gambar" name="gambar" class="form-control" id="exampleInputPassword1">
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


@stop


@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('#check_all').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });
        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#check_all').prop('checked', true);
            } else {
                $('#check_all').prop('checked', false);
            }
        });
        $('.delete-all').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                alert("Please select atleast one record to delete.");
            } else {
                if (confirm("Apakah yakin ingin menghapus semua soal..?")) {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('data_soal.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + strIds,
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                }
            }
        });
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function(event, element) {
                element.closest('form').submit();
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#soal').DataTable();
    });
</script>

@stop
