<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = "jawaban";
    protected $fillable = ['id_user', 'nama', 'nilai'];
}
