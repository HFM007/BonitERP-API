<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TProduct extends Model
{
  use HasFactory;

  protected $table = "t_products";
  protected $fillable = [
    't_products_nama',
    't_products_harga',
    't_products_deskripsi',
    't_products_stok',
    't_products_kategori',
    't_products_gambar',
    't_products_status',
  ];
}
