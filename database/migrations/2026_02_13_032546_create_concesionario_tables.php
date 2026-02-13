<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // 1. Sucursales
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Principal, Sucursal Norte, etc.
            $table->string('address');
            $table->string('phone');
            $table->boolean('has_workshop')->default(true);
            $table->timestamps();
        });

        // 2. Productos (Motos, Repuestos, Fuerza, Servicios)
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['moto', 'repuesto', 'fuerza', 'servicio']);
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);
            $table->integer('cc')->nullable(); // Cilindraje solo para motos
            $table->string('sku')->nullable(); // Código para repuestos
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 3. Inventario por sucursal (Muchos a Muchos)
        Schema::create('branch_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('branch_product');
        Schema::dropIfExists('products');
        Schema::dropIfExists('branches');
    }
};
