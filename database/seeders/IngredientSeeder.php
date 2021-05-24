<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('ingredient_product')->insert([
                [
                    'product_id' => Product::all()->random()->id,
                    'ingredient_id' => Ingredient::all()->random()->id
                ]]);
        }
    }
}
