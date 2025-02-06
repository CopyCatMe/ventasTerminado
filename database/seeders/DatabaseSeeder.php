<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductsSeeder::class,
            ClientsSeeder::class,
            UsersSeeder::class,
            SalesSeeder::class,
            ItemsSeeder::class,
            ItemSalesSeeder::class,
        ]);
    }
}
