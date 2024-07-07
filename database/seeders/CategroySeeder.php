<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategroySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        $categories = [
            'name' => 'men',
            'description' => 'Men Category For Clothes',
            'created_at' => now(),
        ];
        
        DB::table('categories')->insert($categories);
    }
}
