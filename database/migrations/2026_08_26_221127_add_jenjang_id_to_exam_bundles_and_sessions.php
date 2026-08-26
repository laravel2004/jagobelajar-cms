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
            $table->foreignId('jenjang_id')->nullable()->after('name')->constrained('jenjangs')->nullOnDelete();
        });

        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->foreignId('jenjang_id')->nullable()->after('name')->constrained('jenjangs')->nullOnDelete();
        });

        // Migrate data
        $jenjangs = \Illuminate\Support\Facades\DB::table('jenjangs')->get();
        foreach ($jenjangs as $j) {
            \Illuminate\Support\Facades\DB::table('exam_bundles')
                ->where('jenjang', $j->name)
                ->update(['jenjang_id' => $j->id]);

            \Illuminate\Support\Facades\DB::table('exam_sessions')
                ->where('jenjang', $j->name)
                ->update(['jenjang_id' => $j->id]);
        }

        // Drop old string columns
        Schema::table('exam_bundles', function (Blueprint $table) {
            $table->dropColumn('jenjang');
        });
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropColumn('jenjang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_bundles', function (Blueprint $table) {
            $table->string('jenjang')->nullable();
        });
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->string('jenjang')->nullable();
        });

        // Migrate back
        $jenjangs = \Illuminate\Support\Facades\DB::table('jenjangs')->get();
        foreach ($jenjangs as $j) {
            \Illuminate\Support\Facades\DB::table('exam_bundles')
                ->where('jenjang_id', $j->id)
                ->update(['jenjang' => $j->name]);

            \Illuminate\Support\Facades\DB::table('exam_sessions')
                ->where('jenjang_id', $j->id)
                ->update(['jenjang' => $j->name]);
        }

        Schema::table('exam_bundles', function (Blueprint $table) {
            $table->dropForeign(['jenjang_id']);
            $table->dropColumn('jenjang_id');
        });

        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropForeign(['jenjang_id']);
            $table->dropColumn('jenjang_id');
        });
    }
};
