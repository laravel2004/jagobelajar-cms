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
            $table->dateTime('free_package_start_date')->nullable()->after('is_free_package_active');
            $table->dateTime('free_package_end_date')->nullable()->after('free_package_start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_bundles', function (Blueprint $table) {
            $table->dropColumn(['free_package_start_date', 'free_package_end_date']);
        });
    }
};
