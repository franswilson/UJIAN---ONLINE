<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kode extends Model
{
    protected $fillable = ['id_user', 'id_praktikum'];
    protected $table = 'kode';
}
