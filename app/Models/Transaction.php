<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $fillable =
    [
        'transaction_id',
        'cart_id',
        'customer_id',
        'purchase',
        'total',
        'users_id',
    ];
}
