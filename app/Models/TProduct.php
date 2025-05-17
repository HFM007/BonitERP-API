<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TTransaksi;

class TProduct extends Model
{
  use HasFactory;

  protected $table = "t_products";
  protected $primaryKey = "t_products_id";
  public $timestamps = false;
  protected $fillable = [
    't_products_nama',
    't_products_harga',
    't_products_deskripsi',
    't_products_stok',
    't_products_kategori_id',
    't_products_gambar',
    't_products_status',
  ];

  protected $casts = [
    't_products_id' => 'integer',
    't_products_nama' => 'string',
    't_products_harga' => 'string',
    't_products_deskripsi' => 'string',
    't_products_stok' => 'string',
    't_products_kategori_id' => 'integer',
    't_products_gambar' => 'string',
    't_products_status' => 'integer',
  ];

  public function transaksi()
  {
    return $this->hasMany(TTransaksi::class, 't_transaksi_produk_id', 't_products_id');
  }

  public function kategori()
  {
    return $this->belongsTo(MKategori::class, 't_products_kategori_id', 'm_kategori_id');
  }
}
