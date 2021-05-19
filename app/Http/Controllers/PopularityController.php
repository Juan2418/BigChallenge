<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PopularityController extends Controller
{
    public static function chartData()
    {
        return DB::table('order_product')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->select('products.name', DB::raw("COUNT(*) as total"))
            ->whereDate('orders.created_at', '>=', today()->subDays(7))
            ->orderBy('total', 'DESC')
            ->groupBy('order_product.product_id')
            ->take(5)
            ->get();
    }

    public function index()
    {
        $ids = $this->ids();
        return $this->getProducts($ids);
    }

    private function ids()
    {
        return DB::table('order_product')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->select('products.id', DB::raw("COUNT(*) as total"))
            ->whereDate('orders.created_at', '>=', today()->subDays(7))
            ->orderBy('total', 'DESC')
            ->groupBy('order_product.product_id')
            ->take(5)
            ->get();
    }

    public static function names()
    {
        $names = array();
        $query = DB::table('order_product')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->select('products.name', DB::raw("COUNT(*) as total"))
            ->whereDate('orders.created_at', '>=', today()->subDays(7))
            ->orderBy('total', 'DESC')
            ->groupBy('order_product.product_id')
            ->take(5)
            ->get();
        foreach ($query as $result) {
            $names[] = $result->name;
        }
        return $names;
    }

    public static function totalOrderCount()
    {
        $totals = array();
        $query = DB::table('order_product')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->select('products.name', DB::raw("COUNT(*) as total"))
            ->whereDate('orders.created_at', '>=', today()->subDays(7))
            ->orderBy('total', 'DESC')
            ->groupBy('order_product.product_id')
            ->take(5)
            ->get();
        foreach ($query as $result) {
            $totals[] = $result->total;
        }
        return $totals;
    }

    /**
     * @param \Illuminate\Support\Collection $ids
     * @return array
     */
    private function getProducts(\Illuminate\Support\Collection $ids): array
    {
        $products = array();
        for ($i = 0; $i < 5; $i++) {
            $products[] = Product::find($ids[$i]->id);
        }
        return $products;
    }
}
