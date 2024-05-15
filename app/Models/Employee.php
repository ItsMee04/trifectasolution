<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $tabel = "employee";
    protected $fillable = [
        'name',
        'address',
        'phone',
        'profession_id',
        'signature',
        'avatar',
        'status'
    ];
}
