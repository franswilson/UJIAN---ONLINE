<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = "tbl_soal";
    protected $timestamp = false;
    protected $fillable = ['id_praktikum','soal','a','b','c','d','e','knc_jawaban'];
}
