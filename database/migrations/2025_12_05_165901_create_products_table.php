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
           // Informasi Dasar
        $table->string('name'); // Nama Produk
        $table->string('sku')->nullable(); // SKU (Kode Unik), boleh kosong
        $table->string('category'); // Kategori (E-course, Software, dll)
        $table->string('status')->default('Aktif'); // Status (Aktif/Draft)

        // Harga & Komisi
        $table->decimal('price', 15, 2); // Harga (Desimal untuk uang)
        $table->string('commission_type')->default('percent'); // Tipe: 'percent' atau 'fixed'
        $table->decimal('commission', 15, 2); // Nilai komisinya

        // Detail & Media
        $table->text('link')->nullable(); // URL Landing Page
        $table->string('image')->nullable(); // Path gambar yang diupload
        
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
