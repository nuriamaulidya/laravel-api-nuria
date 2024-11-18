<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    
    public function run()
    {
        Product::create(['name' => 'Product 1', 'price' => '1000']);
        Product::create(['name' => 'Product 2', 'price' => '2000']);
        Product::create(['name' => 'Product 3', 'price' => '3000']);
        Product::create(['name' => 'Product 4', 'price' => '4000']);
        Product::create(['name' => 'Product 5', 'price' => '5000']);
    }

}
