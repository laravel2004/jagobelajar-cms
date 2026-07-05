<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->string('source_code')->nullable()->after('external_id');
        });

        Schema::table('user_packages', function (Blueprint $table) {
            $table->string('external_session_id')->nullable()->after('package_id');
            $table->string('external_access_code')->nullable()->after('external_session_id');
            $table->string('join_url')->nullable()->after('external_access_code');
        });
    }

    public function down(): void
    {
        Schema::table('user_packages', function (Blueprint $table) {
            $table->dropColumn(['external_session_id', 'external_access_code', 'join_url']);
        });

        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropColumn('source_code');
        });
    }
};
