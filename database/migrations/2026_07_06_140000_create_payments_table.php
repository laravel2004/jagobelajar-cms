<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('package_type');
            $table->unsignedBigInteger('package_id');
            $table->string('order_id')->unique();
            $table->unsignedInteger('gross_amount');
            $table->string('payment_status')->default('pending');
            $table->string('snap_token')->nullable();
            $table->string('snap_redirect_url')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
