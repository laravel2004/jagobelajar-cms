<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_description',
        'hero_benefits',
        'hero_primary_cta_label',
        'hero_primary_cta_url',
        'hero_secondary_cta_label',
        'hero_secondary_cta_url',
        'hero_image_alt',
        'footer_logo_path',
        'hero_image_path',
        'feature_title',
        'feature_items',
        'program_title',
        'program_description',
        'program_items',
        'gallery_title',
        'testimonials_title',
        'cta_title',
        'cta_description',
        'cta_primary_label',
        'cta_primary_url',
        'cta_secondary_label',
        'cta_secondary_url',
        'footer_tagline',
        'footer_copyright',
        'footer_contact_items',
        'footer_contact_title',
        'footer_menu_items',
        'footer_menu_title',
        'footer_secondary_url',
        'footer_secondary_label',
        'footer_primary_url',
        'footer_primary_label',
        'footer_description',
        'testimonials',
        'gallery_items',
    ];

    protected function casts(): array
    {
        return [
            'hero_benefits' => 'array',
            'feature_items' => 'array',
            'program_items' => 'array',
            'footer_contact_items' => 'array',
            'footer_menu_items' => 'array',
            'testimonials' => 'array',
            'gallery_items' => 'array',
        ];
    }
}
