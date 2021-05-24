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

        Order::factory()->count(7)->create();
        Category::factory()
            ->has(
                Product::factory()
                    ->has(
                        Ingredient::factory()->count(5)
                    )
                    ->count(5)
            )->count(5)
            ->create();

        $this->call([
            ProductSeeder::class,
            CategorySeeder::class,
            OrderSeeder::class
        ]);
    }
}
