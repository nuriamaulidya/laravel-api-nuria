<?php

namespace Database\Seeders;

//use App\Models\Book;
//use App\Models\Author;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        // Memastikan setiap supplier terhubung dengan product yang ada
        $productIds = range(1, 5); // Karena ada 5 product yang dibuat di ProductSeeder
        $currentProductIndex = 0;

        for ($i=1; $i <= 10; $i++) { 
            Supplier::create([
                'name' => 'Supplier '. $i,
                'product_id' => $productIds[$currentProductIndex % 5], // Distribusi merata supplier ke product
                'date' => now(), // Menambahkan tanggal saat ini
            ]);
            $currentProductIndex++;
        }
    }
}