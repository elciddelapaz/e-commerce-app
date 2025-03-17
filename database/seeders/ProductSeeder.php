<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products =[
            [
                'name' => 'Wilkins',
                'price' => 30.59,
            ],
            [
                'name' => 'Absolute',
                'price' => 25.50
            ],
            [
                'name' => "Nature's Spring",
                'price' => 81.50
            ],
            [
                'name' => 'Evian',
                'price' => 80.50
            ],
        ];
        foreach($products as $product){
            Product::create($product);
        }
    }
}
