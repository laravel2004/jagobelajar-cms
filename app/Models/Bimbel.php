<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','short_label','description','image_path','level','schedule','method','sessions_count','price','sale_price','is_promo_active','grup_wa','status','sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sessions_count' => 'integer','price' => 'integer','sale_price' => 'integer','is_promo_active' => 'boolean','sort_order' => 'integer',
        ];
    }

    public function getHasPromoAttribute(): bool
    {
        return $this->is_promo_active && $this->sale_price !== null && $this->sale_price < $this->price;
    }

    public function getDisplayPriceAttribute(): int
    {
        return $this->has_promo ? $this->sale_price : $this->price;
    }
}
