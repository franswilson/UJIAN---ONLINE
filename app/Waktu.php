<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $table = "waktu";
    protected $timestamp = false;
    protected $fillable = ['id_praktikum','waktu_mulai', 'waktu_selesai'];
}
