<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bimbels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_label')->nullable();
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->string('level')->nullable();
            $table->string('schedule')->nullable();
            $table->string('method')->nullable();
            $table->unsignedInteger('sessions_count')->nullable();
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('sale_price')->nullable();
            $table->boolean('is_promo_active')->default(false);
            $table->string('grup_wa')->nullable();
            $table->string('status')->default('draft');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimbels');
    }
};
