<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'tlp', 'alamat', 'npm', 'user_id', 'gambar'];
    protected $table = 'mahasiswa';
}
