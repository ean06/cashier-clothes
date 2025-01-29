<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dengan nama model
    protected $table = 'produk';

    // Menentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'stok'
    ];

    // Menentukan kolom yang tidak bisa diisi (guarded)
    // protected $guarded = ['id'];

    // Menentukan tipe atribut untuk konversi otomatis
    protected $casts = [
        'harga' => 'decimal:2', // harga akan otomatis diformat menjadi tipe decimal
    ];
}
