<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id','source_code','source_slug','name','subject','starts_at','ends_at','source_updated_at','last_fetched_at',
        'slug','title','description','image_path','price','sale_price','is_promo_active','is_free_package_active',
        'status','published_at','sort_order',
    ];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime','ends_at' => 'datetime','source_updated_at' => 'datetime','last_fetched_at' => 'datetime',
            'published_at' => 'datetime','price' => 'integer','sale_price' => 'integer','sort_order' => 'integer',
            'is_promo_active' => 'boolean','is_free_package_active' => 'boolean',
        ];
    }
}
