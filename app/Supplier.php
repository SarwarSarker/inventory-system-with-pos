<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'phone', 'email','photo','address','type', 'shop', 'account_holder','account_number','bank_name', 'bank_branch','city'
    ];

    public function stock(){
        return $this->belongsTo(Stock::class);
    }
}
