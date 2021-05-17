<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderClientRequest;
use App\Models\Order;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(OrderClientRequest $request)
    {
        $orderInfo = request()->all();

        $amount = $this->getAmountFromRequest($orderInfo);

        $newOrder = Order::create(["amount" => $amount, "isPaid" => true]);

        $this->attachProductsToOrder($orderInfo, $newOrder);

        return response("Order has been correctly processed",200)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * @param $newOrder
     * @param $product
     */
    private function attachProductToOrder($newOrder, $product): void
    {
        $ingredients = [];
        foreach ($product['ingredients'] as $ingredient) {
            $ingredients[] = $ingredient['name'];
        }
        $ingredients = json_encode($ingredients);
        $newOrder->products()
            ->attach($product['id'], ["quantity" => $product['quantity'], "ingredients" => $ingredients]);
    }

    /**
     * @param array $orderInfo
     */
    private function getAmountFromRequest(array $orderInfo): int
    {
        $amount = 0;
        foreach ($orderInfo['products'] as $product) {
            $amount += $product['cost'];
        }
        return $amount;
    }

    /**
     * @param array $orderInfo
     * @param $newOrder
     */
    private function attachProductsToOrder(array $orderInfo, $newOrder): void
    {
        foreach ($orderInfo['products'] as $product) {
            $this->attachProductToOrder($newOrder, $product);
        }
    }
}
