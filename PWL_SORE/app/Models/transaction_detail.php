<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction_detail extends Model
{
    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'price'
    ];

    protected $table = 'transaction_details';

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(transaction::class, 'transaction_id', 'id');
    }
}
