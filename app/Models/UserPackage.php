<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'package_type', 'package_id', 'package_name', 'status', 'registered_at', 'external_session_id', 'external_access_code', 'join_url', 'proof_follow_path', 'proof_comment_path'];

    protected function casts(): array
    {
        return [
            'registered_at' => 'datetime',
        ];
    }
}
