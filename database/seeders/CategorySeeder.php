<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('category_product')->insert([
                [
                    'product_id' => Product::all()->random()->id,
                    'category_id' => Category::all()->random()->id
                ]]);
        }
    }
}
