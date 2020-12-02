<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $table = "waktu";
    public $timestamps = false;
    protected $fillable = ['id_modul', 'waktu_mulai', 'waktu_selesai'];
}
