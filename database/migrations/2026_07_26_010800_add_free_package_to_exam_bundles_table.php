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
        Schema::table('exam_bundles', function (Blueprint $table) {
            $table->boolean('is_free_package_active')->default(false)->after('is_promo_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_bundles', function (Blueprint $table) {
            $table->dropColumn('is_free_package_active');
        });
    }
};
