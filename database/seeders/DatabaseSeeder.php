<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        // Admin
        User::firstOrCreate(
    ['email' => 'admin@zevana.com'],
    [
        'name' => 'Admin',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]
);

        // Customers
        User::factory(10)->create([
            'role' => 'customer',
        ]);

      
        
}
}
