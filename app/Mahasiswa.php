<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['user_id', 'nama', 'tlp', 'alamat', 'npm',  'gambar'];
    protected $table = 'mahasiswa';
}
