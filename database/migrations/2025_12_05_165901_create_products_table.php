<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); // Nama Produk
            $table->decimal('commission', 8, 2); // Komisi (misal: 10.50)
            $table->text('description')->nullable(); // Deskripsi (boleh kosong)
            $table->string('status')->default('Aktif'); // Status
            $table->string('image')->nullable(); // Foto Produk
            $table->timestamps(); // Created_at & Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
