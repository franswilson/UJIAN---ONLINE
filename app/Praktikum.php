<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    protected $fillable = ['nama', 'id', 'aktif', 'id_lab'];
    protected $table = 'praktikum';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot(['nama', 'nilai']);
    }
}
