<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function examSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamSession::class);
    }

    public function examBundles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamBundle::class);
    }
}
