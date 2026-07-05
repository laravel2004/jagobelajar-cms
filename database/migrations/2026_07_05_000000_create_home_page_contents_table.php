<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_badge');
            $table->string('hero_title');
            $table->longText('hero_description');
            $table->json('hero_benefits');
            $table->string('hero_primary_cta_label');
            $table->string('hero_primary_cta_url');
            $table->string('hero_secondary_cta_label');
            $table->string('hero_secondary_cta_url');
            $table->string('hero_image_alt');
            $table->string('hero_image_path')->nullable();
            $table->string('feature_title');
            $table->json('feature_items');
            $table->string('program_title');
            $table->longText('program_description');
            $table->json('program_items');
            $table->string('gallery_title');
            $table->string('testimonials_title');
            $table->string('cta_title');
            $table->longText('cta_description');
            $table->string('cta_primary_label');
            $table->string('cta_primary_url');
            $table->string('cta_secondary_label');
            $table->string('cta_secondary_url');
            $table->json('gallery_items')->nullable();
            $table->json('testimonials')->nullable();
            $table->longText('footer_description')->nullable();
            $table->string('footer_primary_label')->nullable();
            $table->string('footer_primary_url')->nullable();
            $table->string('footer_secondary_label')->nullable();
            $table->string('footer_secondary_url')->nullable();
            $table->string('footer_menu_title')->nullable();
            $table->json('footer_menu_items')->nullable();
            $table->string('footer_contact_title')->nullable();
            $table->json('footer_contact_items')->nullable();
            $table->string('footer_copyright')->nullable();
            $table->string('footer_tagline')->nullable();
            $table->string('footer_logo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_page_contents');
    }
};
