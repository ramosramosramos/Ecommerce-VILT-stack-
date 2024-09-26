<?php

use App\Models\Customer;
use App\Models\Shipper;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->constrained('customers')->cascadeOnDelete();
            $table->foreignIdFor(Shipper::class)->constrained('shippers')->cascadeOnDelete();
            $table->string('transaction_id')->nullable();
            $table->decimal('total_amount',10,2);
            $table->string('status')->default('pending');
            $table->timestamp('ship_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
