<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul';
    public $timestamps = false;
    protected $fillable = ['id', 'nama', 'aktif'];
}
