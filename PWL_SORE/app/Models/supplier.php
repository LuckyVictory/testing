<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable = [
        'supplier_name',
        'phone',
        'email'
    ];

    protected $table = 'supplier';

    public $timestamps = true;
}
