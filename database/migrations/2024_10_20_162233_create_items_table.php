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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Item No
            $table->string('name'); // Item Name
            $table->string('inventory_location'); // Inventory Location
            $table->string('brand'); // Brand
            $table->string('category'); // Category
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade'); // Supplier (Dropdown)
            $table->enum('stock_unit', ['pcs', 'kg', 'liters']); // Stock Unit (Dropdown)
            $table->decimal('unit_price', 10, 2); // Unit Price
            $table->json('item_images')->nullable(); // Item Images (Multiple image uploads)
            $table->enum('status', ['Enabled', 'Disabled'])->default('Enabled'); // Status
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
