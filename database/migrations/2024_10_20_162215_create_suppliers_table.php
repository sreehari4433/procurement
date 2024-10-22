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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Supplier No
            $table->string('name'); // Supplier Name
            $table->string('address'); // Address
            $table->string('tax_no'); // TAX No
            $table->string('country'); // Country
            $table->string('mobile_no'); // Mobile No
            $table->string('email')->unique(); // Email
            $table->enum('status', ['Active', 'Inactive', 'Blocked'])->default('Active'); // Status
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
