<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this -> call(UserSeeder::class);
        $this->call(ProductSeeder::class); // Add this line to call the ProductSeeder

    }
}
