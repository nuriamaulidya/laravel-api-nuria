<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();

        $categorys = ['Boy', 'Girl', 'Children', 'GrandPa', 'GrandMa'];

        for ($i = 1; $i <= 10; $i++) {
            Supplier::create([
                'name' => 'Product Title '.$i,
                'product_id' => $products->random()->id, // Menghubungkan customer dengan produk secara acak
                'contact' => fake()->numerify('08##########'), // Generate nomor HP dengan format yang valid
                'category' => $categorys[array_rand($categorys)], // Mengambil kategori secara acak
            ]);
        }
    }

}
