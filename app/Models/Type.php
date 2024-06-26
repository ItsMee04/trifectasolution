<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
    protected $table = 'type';
    protected $fillable = [
        'type',
        'status',
        'icon'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
