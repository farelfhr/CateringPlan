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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->foreignId('plan_id')->constrained('meal_plans')->onDelete('cascade');
            $table->json('meal_types');
            $table->json('delivery_days');
            $table->text('allergies')->nullable();
            $table->decimal('total_price', 12, 2);
            $table->enum('status', ['active', 'paused', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
