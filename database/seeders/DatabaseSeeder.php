<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Order;
use App\Models\Ingredient;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Ingredient::factory()->count(10)->create();
        Category::factory()->count(5)->create();
        Product::factory()->has(Ingredient::factory()->count(5))->count(10)->create();
        Order::factory()->has(Product::factory()->count(5))->count(15)->create();
    }
}
