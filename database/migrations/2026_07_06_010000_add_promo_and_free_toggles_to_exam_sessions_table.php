<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->boolean('is_promo_active')->default(false)->after('sale_price');
            $table->boolean('is_free_package_active')->default(false)->after('is_promo_active');
        });
    }

    public function down(): void
    {
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropColumn(['is_promo_active', 'is_free_package_active']);
        });
    }
};
