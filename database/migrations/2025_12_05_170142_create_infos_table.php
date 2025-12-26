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
        Schema::create('infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title'); // Judul Pengumuman
            $table->string('author'); // pembuat pengumuman
            $table->string('type')->default('General'); // tipe pengumuman 
            $table->date('published_at')->nullable(); // Tanggal Publikasi
            $table->enum('status', ['Terbit', 'Dijadwalkan', 'Diarsipkan', 'Draft'])->default('Draft');
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
