<?php

use App\Models\UserRole;
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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(UserRole::class)->constrained()->cascadeOnDelete();
            $table->string('company_name')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('discount_available')->nullable();
            $table->string('type_goods')->nullable();
            $table->string('current_order')->nullable();
            $table->string('logo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
