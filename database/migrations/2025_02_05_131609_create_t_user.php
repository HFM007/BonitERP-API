<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('t_user', function (Blueprint $table) {
      $table->id('t_user_id');
      $table->string('t_user_nama');
      $table->string('t_user_email')->unique();
      $table->string('t_user_password');
      $table->integer('t_user_status');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('t_user');
  }
};
