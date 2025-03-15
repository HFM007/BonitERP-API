<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MKategori;

class MKategoriSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    MKategori::create([
      'm_kategori_nama' => 'Minuman',
      'm_kategori_status' => '1',
    ]);

    MKategori::create([
      'm_kategori_nama' => 'Makanan',
      'm_kategori_status' => '1',
    ]);

    MKategori::create([
      'm_kategori_nama' => 'Snack',
      'm_kategori_status' => '1',
    ]);

    MKategori::create([
      'm_kategori_nama' => 'Es Krim',
      'm_kategori_status' => '1',
    ]);
  }
}
