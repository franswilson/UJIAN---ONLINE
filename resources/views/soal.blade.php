@extends('layouts/layout')

@section('content')
div class="main">
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="text-center">
                                <h3>
                                    <class class="panell-title"><b>Ujian Online Pilihan Ganda</b></class>

                                </h3>
                                <form name="form1" method="post" action="{{ route('jawab.store') }}">

                                    <div class=" form-group">

                                        <div class="col-md-12">
                                            <label for="exampleInputPassword1">Praktikum</label>
                                            <select name="praktikum" class="form-control" id="exampleInputPassword1">
                                                @foreach ($praktikum as $p)
                                                <option value="{{$p->id}}">{{$p->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                            </div>



                            <table width="100%" border="0">

                                @php
                                $angka = 1;
                                $soal = Session::get('soal');
                                $jawab = Session::get('jawab');
                                $jawaban = Session::get('jawaban');
                                @endphp
                                @foreach($soal[0] as $s)


                                @csrf
                                <tr>
                                    <td width="17">
                                        <font color="#000000">{{$angka}}</font>
                                    </td>
                                    <td width="430">
                                        <font color="#000000">{{$s->soal}}</font>
                                    </td>
                                </tr>
                                @if($s->gambar)
                                <tr>
                                    <td></td>
                                    <td><img src="{{asset('gambar/'.$s->gambar)}}" width='200' hight='200'></td>
                                </tr>
                                @endif
                                <tr>
                                    <td height="21">
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">
                                            A. <input name="pilihan[{{ $s->id }}]" type="radio" value="a" @php $no=-1; for($i=0;$i<count($jawab);$i++){ if($jawab[$i]=="pilihan[" .$s->id."]"){
                                            $no = $i;
                                            }
                                            }
                                            if($no > -1){
                                            if($jawaban[$no] == "a"){
                                            echo "checked";
                                            }
                                            }
                                            @endphp
                                            >
                                            {{$s->a}}</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">
                                            B. <input name="pilihan[{{ $s->id }}]" type="radio" value="b" @php $no=-1; for($i=0;$i<count($jawab);$i++){ if($jawab[$i]=="pilihan[" .$s->id."]"){
                                            $no = $i;
                                            }
                                            }
                                            if($no > -1){
                                            if($jawaban[$no] == "b"){
                                            echo "checked";
                                            }
                                            }
                                            @endphp
                                            >
                                            {{$s->b}}</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">
                                            C. <input name="pilihan[{{ $s->id }}]" type="radio" value="c" @php $no=-1; for($i=0;$i<count($jawab);$i++){ if($jawab[$i]=="pilihan[" .$s->id."]"){
                                            $no = $i;
                                            }
                                            }
                                            if($no > -1){
                                            if($jawaban[$no] == "c"){
                                            echo "checked";
                                            }
                                            }
                                            @endphp
                                            >
                                            {{$s->c}}</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">

                                            D. <input name="pilihan[{{ $s->id }}]" type="radio" value="d" @php $no=-1; for($i=0;$i<count($jawab);$i++){ if($jawab[$i]=="pilihan[" .$s->id."]"){
                                            $no = $i;
                                            }
                                            }
                                            if($no > -1){
                                            if($jawaban[$no] == "d"){
                                            echo "checked";
                                            }
                                            }
                                            @endphp
                                            >
                                            {{$s->d}}</font>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">

                                            E. <input name="pilihan[{{ $s->id }}]" type="radio" value="e" @php $no=-1; for($i=0;$i<count($jawab);$i++){ if($jawab[$i]=="pilihan[" .$s->id."]"){
                                            $no = $i;
                                            }
                                            }
                                            if($no > -1){
                                            if($jawaban[$no] == "e"){
                                            echo "checked";
                                            }
                                            }
                                            @endphp
                                            >
                                            {{$s->e}}</font>
                                    </td>

                                </tr>

                                @php
                                $angka++;
                                @endphp
                                @endforeach
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
                                </tr>
                            </table>

                            </form>
                            </p>
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
        $('input[type=radio]').click(function() {
            var nilai = $(this).attr("value");
            var soal = $(this).attr("name");
            $.ajax({

                url: "{{ url('/soal') }}/" + soal + "/" + nilai,
                type: "get",
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {

                }

            });

        });

    });
</script>
@endsection