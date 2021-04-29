<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'role' => 'admin',
             'username' => 'admin',
             'password' => bcrypt('admin123'),
             'password_deHash' => bcrypt('admin123')
         ]);
         \App\Models\User::factory()->create([
             'role' => 'user',
             'username' => 'user',
             'password' => bcrypt('user123'),
             'password_deHash' => bcrypt('user123')
         ]);
    }
}
