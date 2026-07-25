<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exam_bundles', function (Blueprint $table) {
            $table->id();
            $table->string('external_id')->nullable()->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('sale_price')->nullable();
            $table->boolean('is_promo_active')->default(false);
            $table->string('status')->default('draft');
            $table->unsignedInteger('sort_order')->default(0);
            $table->dateTime('source_updated_at')->nullable();
            $table->dateTime('last_fetched_at')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_bundles');
    }
};
