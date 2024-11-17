<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dish::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        return $dish;
    }
}
