<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'status',
        'barcode',
        'expiration',
    ];
}
