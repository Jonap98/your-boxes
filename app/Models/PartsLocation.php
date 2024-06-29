<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsLocation extends Model
{
    use HasFactory;
    protected $table = 'parts_location';
    protected $fillable = [
        'location_id',
        'part_id',
    ];
}
