<?php

namespace App\Models; // Baris 4

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Baris 6
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model // Baris 9
{
// ...
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    
    // WAJIB ADA DAN LENGKAP
    protected $fillable = [
        'name', 
        'commission', 
        'description', 
        'status', 
        'image' 
    ]; 
}