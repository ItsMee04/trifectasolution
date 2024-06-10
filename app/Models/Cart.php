<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable =
    [
        'codecart',
        'product_id',
        'users_id',
        'status',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
