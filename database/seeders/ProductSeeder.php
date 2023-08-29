<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = Category::all();
        $us = User::all();

        for ($i = 0; $i < 100; $i++) {
            $user = $us->random();
            $category = $cat->random();

            Product::factory()->create([
                'user_id'       => $user->id,
                'category_id'   => $category->id
            ]);
        }
    }
}
