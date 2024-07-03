<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'codeproduct',
        'name',
        'sellingprice',
        'purchaseprice',
        'description',
        'type_id',
        'category_id',
        'weight',
        'carat',
        'image',
        'status'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
