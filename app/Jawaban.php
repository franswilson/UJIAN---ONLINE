<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = "praktikum_user";
    protected $fillable = ['id_user', 'id_praktikum', 'nama', 'nilai', 'id'];
}
