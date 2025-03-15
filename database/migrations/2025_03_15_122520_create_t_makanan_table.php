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
    Schema::create('t_makanan', function (Blueprint $table) {
      $table->id('t_makanan_id');
      $table->string('t_makanan_nama');
      $table->string('t_makanan_harga');
      $table->string('t_makanan_deskripsi');
      $table->string('t_makanan_stok');
      $table->string('t_makanan_kategori');
      $table->string('t_makanan_gambar');
      $table->string('t_makanan_status');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('t_makanan');
  }
};
