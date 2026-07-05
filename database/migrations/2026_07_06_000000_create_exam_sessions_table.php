<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exam_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('external_id')->unique();
            $table->string('source_slug')->nullable();
            $table->string('name');
            $table->string('subject')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->dateTime('source_updated_at')->nullable();
            $table->dateTime('last_fetched_at')->nullable();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('sale_price')->nullable();
            $table->string('status')->default('draft');
            $table->dateTime('published_at')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_sessions');
    }
};
