<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TTransaksiDetail extends Model
{
  protected $table = "t_transaksi_detail";
  protected $primaryKey = "t_transaksi_detail_id";
  public $timestamps = false;
  protected $fillable = [
    't_transaksi_detail_transaksi_id',
    't_transaksi_detail_produk_id',
    't_transaksi_detail_jumlah',
  ];
  protected $casts = [
    't_transaksi_detail_id' => 'integer',
    't_transaksi_detail_transaksi_id' => 'integer',
    't_transaksi_detail_produk_id' => 'integer',
    't_transaksi_detail_jumlah' => 'integer',
  ];
  public function product()
  {
    return $this->belongsTo(TProduct::class, 't_transaksi_detail_produk_id', 't_products_id');
  }
  public function transaksi()
  {
    return $this->belongsTo(TTransaksi::class, 't_transaksi_detail_transaksi_id', 't_transaksi_id');
  }
}
