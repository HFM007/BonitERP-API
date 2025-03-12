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
    Schema::create('t_products', function (Blueprint $table) {
      $table->id('t_products_id');
      $table->string('t_products_nama');
      $table->string('t_products_harga');
      $table->string('t_products_deskripsi');
      $table->string('t_products_stok');
      $table->string('t_products_kategori');
      $table->string('t_products_gambar');
      $table->string('t_products_status');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('t_products');
  }
};
