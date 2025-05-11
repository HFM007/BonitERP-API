<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Psy\Readline\Hoa\FileLink;
use App\Models\TProduct;
use App\Models\TUser;
use App\Models\MKategori;

class TTransaksi extends Model
{
  protected $table = "t_transaksi";
  protected $primaryKey = "t_transaksi_id";
  public $timestamps = true;
  protected $fillable = [
    't_transaksi_user_id',
    't_transaksi_produk_id',
    't_transaksi_jumlah',
    't_transaksi_total_harga',
    't_transaksi_jenis_pembayaran',
    't_transaksi_status',
  ];

  protected $casts = [
    't_transaksi_id' => 'integer',
    't_transaksi_user_id' => 'integer',
    't_transaksi_produk_id' => 'integer',
    't_transaksi_jumlah' => 'integer',
    't_transaksi_total_harga' => 'string',
    't_transaksi_jenis_pembayaran' => 'string',
    't_transaksi_status' => 'integer',
  ];

  public function product()
  {
    return $this->belongsTo(TProduct::class, 't_transaksi_produk_id', 't_products_id');
  }
  public function user()
  {
    return $this->belongsTo(TUser::class, 't_transaksi_user_id', 't_user_id');
  }
}
