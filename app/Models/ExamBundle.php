<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamBundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id', 'name', 'slug', 'title', 'description', 'image_path',
        'price', 'sale_price', 'is_promo_active', 'is_free_package_active', 'status', 'sort_order',
        'source_updated_at', 'last_fetched_at', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'sale_price' => 'integer',
            'is_promo_active' => 'boolean',
            'is_free_package_active' => 'boolean',
            'sort_order' => 'integer',
            'source_updated_at' => 'datetime',
            'last_fetched_at' => 'datetime',
            'published_at' => 'datetime',
        ];
    }

    public function sessions()
    {
        return $this->belongsToMany(ExamSession::class, 'exam_bundle_session');
    }
}
