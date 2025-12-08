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
    Schema::table('users', function (Blueprint $table) {
        // Menambahkan kolom baru ke tabel users yang sudah ada
        $table->string('department')->nullable()->after('email');
        $table->string('role')->default('Staff')->after('department');
        $table->string('phone')->nullable()->after('name');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['department', 'role', 'phone']);
    });
}
};
