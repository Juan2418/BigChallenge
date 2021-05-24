<?php

namespace Database\Seeders;

use App\Models\Product;
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

        foreach(Product::all() as $product) {
            DB::table('products')
                ->where('id', '=', $product->id)
                ->update(['image' => 'images/' . $images[array_rand($images)] . '.jpg']);
        }
    }
}
