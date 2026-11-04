<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'id',
        'supplier_name',
        'product_name',
        'buy_price',
        'sell_price',
    ];

    protected $table = 'products';

    public $timestamps = true;
}
