<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    protected $fillable = ['nama', 'kode', 'aktif'];
    protected $table = 'praktikum';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot(['nama', 'nilai']);
    }
}
