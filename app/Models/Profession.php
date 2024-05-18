<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profession extends Model
{
    use HasFactory;
    protected $table = "profession";
    protected $fillable = [
        'profession',
        'status',
    ];

    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
