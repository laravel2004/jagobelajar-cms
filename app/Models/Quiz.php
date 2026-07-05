<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'difficulty_level',
        'duration_in_minutes',
        'attempt_limit',
        'status',
    ];
}
