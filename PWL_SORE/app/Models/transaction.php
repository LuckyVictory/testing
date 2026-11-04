<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'invoice_number',
        'supplier_id',
        'transaction_type',
        'subtotal'
       
    ];

    protected $table = 'transaction';

    public $timestamps = true;

    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'supplier_id', 'id');
    }

    public function transaction_detail()
    {
        return $this->hasMany(transaction_detail::class, 'transaction_id', 'id');
    }
}
