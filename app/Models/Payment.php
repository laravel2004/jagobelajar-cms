<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bimbel;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','package_type','package_id','order_id','gross_amount','payment_status','snap_token','snap_redirect_url','paid_at',
    ];

    public function package()
    {
        return $this->belongsTo(Bimbel::class, 'package_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'gross_amount' => 'integer',
            'paid_at' => 'datetime',
        ];
    }
}
