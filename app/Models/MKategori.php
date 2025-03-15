<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKategori extends Model
{
  protected $table = "m_kategori";
  
  public $timestamps = false;

  protected $primaryKey = "m_kategori_id";

  protected $fillable = [
    'm_kategori_nama',
    'm_kategori_status',
  ];
}