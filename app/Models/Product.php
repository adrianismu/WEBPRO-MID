<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; // Menggunakan HasFactory untuk factory model

    protected $table = 'products'; // Menetapkan nama tabel yang digunakan dalam basis data
    protected $fillable = ['name', 'category', 'quantity', 'price', 'image']; // Menentukan kolom yang dapat diisi (fillable) ketika menyimpan data produk
}
