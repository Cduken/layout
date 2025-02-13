<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Saging',
            'price' => 10,
            'description' => 'Fresh bananas from the farm.',
            'image' => 'https://via.placeholder.com/150',
        ]);

        Product::create([
            'name' => 'Ginamos',
            'price' => 20,
            'description' => 'Authentic fermented fish.',
            'image' => '/storage/images/ginamos.webp',
        ]);

        Product::create([
            'name' => 'Suka',
            'price' => 30,
            'description' => 'Locally made vinegar.',
            'image' => 'https://via.placeholder.com/150',
        ]);
    }
}
