<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nama', 'alamat', 'tlp'];
    protected $table = 'customer';
}
