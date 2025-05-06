<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TUser extends Authenticatable
{
  use HasFactory, Notifiable, HasApiTokens;

  protected $table = "t_user";
  protected $primaryKey = "t_user_id";
  public $timestamps = false;
  protected $fillable = [
    't_user_nama',
    't_user_email',
    't_user_password',
    't_user_status',
  ];

  protected $hidden = [
    't_user_password',
    't_user_id'
  ];
}
