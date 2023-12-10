<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'location',
        'value',
        'quantity',
        'draw_date',
    ];

    protected $dates = [
        'draw_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
