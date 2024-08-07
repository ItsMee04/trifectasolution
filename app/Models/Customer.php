<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'identity',
        'point',
        'birthday',
        'status'
    ];

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
