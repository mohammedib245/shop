<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();

        $products = [
            'name' => 'T-shirt',
            'description' => Str::random(40),
            'price'  => 0.0,
            'stock'  => 5,
            'image'  => '',
            'category_id' => Category::first()->id,
            'created_at' => now(),
        ];
        
        DB::table('products')->insert($products);
    }
}
