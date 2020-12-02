<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_soal extends Model
{
    protected $table = "tbl_soal";
    public $timestamps = false;
    protected $fillable = ['id_modul', 'soal', 'a', 'b', 'c', 'd', 'e', 'knc_jawaban', 'gambar'];
}
