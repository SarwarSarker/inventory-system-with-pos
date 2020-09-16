<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Stock;

class Product extends Model
{
    protected $fillable = [
        'cat_id', 'sup_id', 'p_name','p_code','p_garage', 'p_route', 'p_image','quantity','buying_price', 'selling_price','buying_date','expiry_date'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
