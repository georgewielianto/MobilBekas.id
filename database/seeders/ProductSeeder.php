<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
            'name' => 'Motor',
            'price' => 20000000,
            'description' => 'Kondisi prima dan irit bensin',
            'image' => 'Avanza/toyota_avanza_g_15_at_2023_1718364155_8c24ecf4_progressive.jpg',
            'image2' => 'public/images/1717076891.jpg',
            'image3' => 'public/images/1717076891.jpg',
            'image4' => 'public/images/1717076891.jpg',
            ],
            
        ]);

     
    }
}
