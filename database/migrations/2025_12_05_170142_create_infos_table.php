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
            $table->id();
            $table->string('title'); // Judul Pengumuman
            $table->string('type'); // Tipe (Umum/Libur/dll)
            $table->text('content'); // Isi Pengumuman
            $table->string('status')->default('Published'); // Status
            $table->date('published_at')->nullable(); // Tanggal Publikasi
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
