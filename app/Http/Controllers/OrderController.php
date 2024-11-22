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
        return $order->load(['client', 'dishes']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return $order->load(['client', 'dishes']);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return $order->load(['client', 'dishes']);
    }
}
