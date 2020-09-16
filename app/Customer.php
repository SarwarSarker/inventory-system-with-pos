<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone', 'email','photo','address', 'shopname', 'account_holder','account_number','bank_name', 'bank_branch','city'
    ];
}
