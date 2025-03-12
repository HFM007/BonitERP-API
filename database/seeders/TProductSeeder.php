<?php

namespace Database\Seeders;

use App\Models\TProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $faker = \Faker\Factory::create('id_ID');
    for ($i = 0; $i < 5; $i++) {
      TProduct::create([
        't_products_nama' => $faker->name,
        't_products_harga' => $faker->randomNumber(5),
        't_products_deskripsi' => $faker->text,
        't_products_stok' => $faker->randomNumber(2),
        't_products_kategori' => $faker->randomElement(['Makanan', 'Minuman', 'Snack']),
        't_products_gambar' => $faker->imageUrl(),
        't_products_status' => $faker->randomElement(['1', '0']),
      ]);
    }
  }
}
