<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin kullanıcı
        User::create([
            'name' => 'Admin',
            'email' => 'admin@smart.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'is_active' => true,
            'balance' => 0,
        ]);

        // 5 normal kullanıcı
        User::factory(5)->create([
            'role' => 'user',
            'is_active' => true,
            'balance' => 0,
        ]);

        // Ürünler
        $this->call(ProductSeeder::class);
    }
}
