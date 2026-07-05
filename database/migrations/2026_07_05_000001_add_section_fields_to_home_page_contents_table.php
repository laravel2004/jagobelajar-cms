<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('home_page_contents', function (Blueprint $table) {
            if (! Schema::hasColumn('home_page_contents', 'gallery_items')) {
                $table->json('gallery_items')->nullable()->after('gallery_title');
                $table->string('hero_image_path')->nullable()->after('hero_image_alt');
                $table->json('testimonials')->nullable()->after('testimonials_title');
                $table->longText('footer_description')->nullable()->after('cta_secondary_url');
                $table->string('footer_primary_label')->nullable()->after('footer_description');
                $table->string('footer_primary_url')->nullable()->after('footer_primary_label');
                $table->string('footer_secondary_label')->nullable()->after('footer_primary_url');
                $table->string('footer_secondary_url')->nullable()->after('footer_secondary_label');
                $table->string('footer_menu_title')->nullable()->after('footer_secondary_url');
                $table->json('footer_menu_items')->nullable()->after('footer_menu_title');
                $table->string('footer_contact_title')->nullable()->after('footer_menu_items');
                $table->json('footer_contact_items')->nullable()->after('footer_contact_title');
                $table->string('footer_copyright')->nullable()->after('footer_contact_items');
                $table->string('footer_tagline')->nullable()->after('footer_copyright');
                $table->string('footer_logo_path')->nullable()->after('footer_tagline');
            }
        });
    }

    public function down(): void
    {
        Schema::table('home_page_contents', function (Blueprint $table) {
            foreach (['hero_image_path', 'gallery_items', 'testimonials', 'footer_description', 'footer_primary_label', 'footer_primary_url', 'footer_secondary_label', 'footer_secondary_url', 'footer_menu_title', 'footer_menu_items', 'footer_contact_title', 'footer_contact_items', 'footer_copyright', 'footer_tagline', 'footer_logo_path'] as $column) {
                if (Schema::hasColumn('home_page_contents', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
