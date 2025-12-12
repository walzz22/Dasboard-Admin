<?php

namespace App\Models;

// Import Trait yang diperlukan

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids; // Gunakan Trait HasUuids

    // 1. Pengaturan ID UUID
    // Memberi tahu Eloquent bahwa ID bukan integer
    protected $keyType = 'string';
    public $incrementing = false;
    
    // 2. Kolom yang Boleh Diisi (Mass Assignment)
    // WAJIB berisi semua kolom yang ada di formulir 'Tambah Karyawan'
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'department', // Kolom tambahan untuk Karyawan
        'role',       // Kolom tambahan untuk Peran (Admin/Staff)
    ];

    // 3. Kolom yang Disembunyikan (Saat di-serialize)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 4. Casting Atribut
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // 5. RELASI (Jika ada)
    
    /**
     * Relasi: Satu Karyawan bisa memiliki banyak Produk Afiliasi.
     * (Opsional: Hanya jika Anda menambahkan kolom user_id di tabel products)
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}