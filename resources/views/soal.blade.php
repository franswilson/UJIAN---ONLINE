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
                                <form id="formSoal" name="form1" method="post" action="{{ route('jawab.store') }}">
                            </div>

                            <style>
                                p {
                                    text-align: right;
                                    font-size: 20px;
                                    margin-top: 0px;
                                }
                            </style>
                            <p id="timer"></p>

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
                                    <td><input id="tombolSubmit" type="submit" name="submit" value="Jawab"></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script>
    // program timer
    // alert(moment("{{ $cek->waktu_mulai }}", "YYYY-MM-DD HH:mm:ss").format("MMM DD, YYYY HH:mm:ss").valueOf());
    const tgl = moment("{{ $cek->waktu_selesai }}", "YYYY-MM-DD HH:mm:ss").format("MMM DD, YYYY HH:mm:ss").valueOf();
    // alert(tgl);
    const tgltujuan = new Date(tgl).getTime();
    // alert(tgltujuan);

    const hitungmundur = setInterval(function() {
        const tglsekarang = new Date().getTime();
        const selisih = tgltujuan - tglsekarang;

        const jam = Math.floor(selisih % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        const menit = Math.floor(selisih % (1000 * 60 * 60) / (1000 * 60));
        const detik = Math.floor(selisih % (1000 * 60) / (1000));

        const timer = document.getElementById('timer');
        timer.innerHTML = 'waktu ujian : ' + jam + ':' + menit + ':' + detik;

        if (selisih < 0) {
            clearInterval(hitungmundur);
            timer.innerHTML = 'waktu telah habis';
            // $('#tombolSubmit').click();
        }
    }, 1000);



    // document.getElementById('timer').innerHTML =
    //     60 + ":" + 00;
    // startTimer();

    // function startTimer() {
    //     var presentTime = document.getElementById('timer').innerHTML;
    //     var timeArray = presentTime.split(/[:]+/);
    //     var m = timeArray[0];
    //     var s = checkSecond((timeArray[1] - 1));
    //     if (s == 59) {
    //         m = m - 1
    //     }
    //     //if(m<0){alert('timer completed')}
    //     document.getElementById('timer').innerHTML =
    //         m + ":" + s;
    //     setTimeout(startTimer, 1000);
    // }

    // function checkSecond(sec) {
    //     if (sec < 10 && sec >= 0) {
    //         sec = "0" + sec
    //     }; // add zero in front of numbers < 10
    //     if (sec < 0) {
    //         sec = "59"
    //     };
    //     return sec;
    // }
</script>
@endsection
