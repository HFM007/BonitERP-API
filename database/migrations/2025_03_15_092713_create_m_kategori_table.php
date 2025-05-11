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
    Schema::create('m_kategori', function (Blueprint $table) {
      $table->id('m_kategori_id');
      $table->string('m_kategori_nama');
      $table->integer('m_kategori_status');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('m_kategori');
  }
};
