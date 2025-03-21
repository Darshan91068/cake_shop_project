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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User ID (FK)
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade'); // Cart ID (FK)
            $table->integer('pro_qty'); // Product Quantity
            $table->decimal('pro_price', 10, 2); // Product Price
            $table->decimal('grand_total', 10, 2); // Total Price (qty * price)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
