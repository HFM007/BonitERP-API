<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TMakanan extends Model
{
  protected $table = "t_makanan";
  protected $primaryKey = "t_makanan_id";
  public $timestamps = false;
  protected $fillable = [
    "t_makanan_nama",
    "t_makanan_harga",
    "t_makanan_deskripsi",
    "t_makanan_stok",
    "t_makanan_kategori",
    "t_makanan_gambar",
    "t_makanan_status",
  ];
}
