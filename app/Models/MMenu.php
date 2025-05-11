<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMenu extends Model
{
  protected $table = 'm_menu';
  protected $primaryKey = 'm_menu_id';
  public $timestamps = false;

  protected $fillable = [
    'm_menu_nama',
    'm_menu_link',
    'm_menu_parents',
    'm_menu_status'
  ];

  protected $casts = [
    'm_menu_id' => 'integer',
    'm_menu_nama' => 'string',
    'm_menu_link' => 'string',
    'm_menu_parents' => 'integer',
    'm_menu_status' => 'integer'
  ];
}
