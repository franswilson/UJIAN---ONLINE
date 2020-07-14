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
                            <h3>
                                <class class="panell-title"><b>Ujian Online Pilihan Ganda</b></class>

                            </h3>
                            <form name="form1" method="post" action="{{ route('jawab.store') }}">

                                <div class=" form-group">

                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Praktikum</label>
                                        <select name="nama" class="form-control" id="exampleInputPassword1">
                                            @foreach ($praktikum as $p)
                                            <option value="{{$p->nama}}">{{$p->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <table width="100%" border="0">

                                    @php
                                    $angka = 1;
                                    @endphp
                                    @foreach($soal as $s)


                                    @csrf
                                    <input type="hidden" name="jumlah" value="{{$s->jumlah}}">
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
                                                A. <input name="pilihan[{{ $s->id }}]" type="radio" value="a">
                                                {{$s->a}}</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <font color="#000000">&nbsp;</font>
                                        </td>
                                        <td>
                                            <font color="#000000">
                                                B. <input name="pilihan[{{ $s->id }}]" type="radio" value="b">
                                                {{$s->b}}</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <font color="#000000">&nbsp;</font>
                                        </td>
                                        <td>
                                            <font color="#000000">
                                                C. <input name="pilihan[{{ $s->id }}]" type="radio" value="c">
                                                {{$s->c}}</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <font color="#000000">&nbsp;</font>
                                        </td>
                                        <td>
                                            <font color="#000000">

                                                D. <input name="pilihan[{{ $s->id }}]" type="radio" value="d">
                                                {{$s->d}}</font>
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