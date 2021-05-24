<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('order_product')->insert([
                [
                    'product_id' => Product::all()->random()->id,
                    'order_id' => Order::all()->random()->id,
                    'ingredients' => '[]'
                ]]);
        }
    }
}
