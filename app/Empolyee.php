<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empolyee extends Model
{
    protected $fillable = [
        'name', 'phone', 'email','address', 'experience', 'photo', 'salary','city'
    ];
}
