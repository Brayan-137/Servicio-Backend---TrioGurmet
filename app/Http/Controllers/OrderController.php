<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::with(['client', 'dishes'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());

        $dishes_input = $request->input('dishes');
        $temp_dishes = [];
        foreach($dishes_input as $dish) {
            $temp_dishes[$dish["id"]] = [
                'quantity' => $dish["quantity"],
                'created_at' => now()
            ];
        }
        $order->dishes()->sync($temp_dishes);

        return $order->load(['client', 'dishes']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $order = Order::where('id', $request->id)->first();
        return $order->load(['client', 'dishes']);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return $order->load(['client', 'dishes']);
    }
}
