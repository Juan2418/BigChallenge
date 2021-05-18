<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PopularityController extends Controller
{
    public static function chartData()
    {
        return DB::table('order_product')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->select('products.name', DB::raw("COUNT(*) as total"))
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
            ->select('products.name', DB::raw("COUNT(*) as total"))
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
            ->select('products.name', DB::raw("COUNT(*) as total"))
            ->orderBy('total', 'DESC')
            ->groupBy('order_product.product_id')
            ->take(5)
            ->get();
        foreach ($query as $result) {
            $totals[] = $result->total;
        }
        return $totals;
    }
}
