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
        $images = ['hamburgers', 'coke', 'pizza', 'fries'];
        foreach(Category::all() as $category) {
            DB::table('categories')
                ->where('id', '=', $category->id)
                ->update(['image' => 'images/' . $images[array_rand($images)] . '.jpg']);
//            $category->update(['image' => 'images/' . array_rand(['hamburger', 'coke', 'pizza', 'fries']) . '.jpg']);
        }
        for ($i = 0; $i < 30; $i++) {
            DB::table('category_product')->insert([
                [
                    'product_id' => Product::all()->random()->id,
                    'category_id' => Category::all()->random()->id
                ]]);
        }
    }
}
