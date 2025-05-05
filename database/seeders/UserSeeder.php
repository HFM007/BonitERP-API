<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $users = [
      [
        'name' => 'superAdmin',
        'email' => 'superAdmin@email.com',
        'password' => Hash::make('12345'),
      ],
    ];

    foreach ($users as $user) {
      User::create($user);
    }
  }
}
