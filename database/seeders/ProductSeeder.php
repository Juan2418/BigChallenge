<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['coke', 'hamburgers', 'pizza', 'fries'];
        DB::table('products')->insert([
            [
                'name' => 'Eugene ',
                'description' => 'a description',
                'category_id' => Category::all()->random()->id,
                'image' => 'images/' . $images[array_rand($images)] . '.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name' => 'Chystiak',
                'description' => 'a description',
                'category_id' => Category::all()->random()->id,
                'image' => 'images/' . $images[array_rand($images)] . '.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name' => 'Eue Chystiak',
                'description' => 'a description',
                'category_id' => Category::all()->random()->id,
                'image' => 'images/' . $images[array_rand($images)] . '.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]]);
    }
}
