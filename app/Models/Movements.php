<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movements extends Model
{
    use HasFactory;
    protected $table = 'movements';
    protected $fillable = [
        'quantity',
        'comment',
        'movement_type_id',
        'part_id',
        'user_id',
    ];
}
