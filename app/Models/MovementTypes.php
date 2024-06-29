<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovementTypes extends Model
{
    use HasFactory;
    protected $table = 'movement_types';
    protected $fillable = [
        'movement',
    ];
}
