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
    Schema::create('t_transaksi_detail', function (Blueprint $table) {
      $table->id('t_transaksi_detail_id');
      $table->foreignId('t_transaksi_detail_transaksi_id')->constrained('t_transaksi', 't_transaksi_id')->onDelete('cascade');
      $table->foreignId('t_transaksi_detail_produk_id')->constrained('t_products', 't_products_id')->onDelete('cascade');
      $table->integer('t_transaksi_detail_jumlah');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('t_transaksi_detail');
  }
};
