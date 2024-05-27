<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'codeproduct',
        'name',
        'price',
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
        return $this->belongsTo(Product::class);
    }
}
