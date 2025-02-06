<?php

namespace Database\Seeders;

use App\Models\ItemSales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Llamo al factory
         ItemSales::factory(15)->create();
    }
}
