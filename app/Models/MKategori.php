<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKategori extends Model
{
  protected $table = "m_kategori";
  protected $primaryKey = "m_kategori_id";
  public $timestamps = false;

  protected $fillable = [
    'm_kategori_nama',
    'm_kategori_status',
  ];
}