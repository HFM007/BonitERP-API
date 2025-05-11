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
    Schema::create('t_transaksi', function (Blueprint $table) {
      $table->id('t_transaksi_id');
      $table->foreignId('t_transaksi_user_id')->constrained('t_user', 't_user_id')->onDelete('cascade');
      $table->string('t_transaksi_total_harga');
      $table->string('t_transaksi_jenis_pembayaran');
      $table->integer('t_transaksi_status');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('t_transaksi');
  }
};