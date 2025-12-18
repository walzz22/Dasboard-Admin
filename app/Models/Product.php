<?php

namespace App\Models; // Baris 4

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Baris 6
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model // Baris 9
{
// ...
    use HasFactory, HasUuids;

    // WAJIB ADA DAN LENGKAP
 protected $fillable = [
        'name',
        'sku',
        'category',
        'status',
        'price',
        'commission_type', // Persentase atau Nominal Tetap
        'commission',      // Nilainya
        'link',
        'image'
    ];
}   