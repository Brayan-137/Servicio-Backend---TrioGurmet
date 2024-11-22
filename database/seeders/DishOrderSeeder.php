<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        foreach($orders as $order) {
            $dishes = Dish::inRandomOrder()->take(3)->get();

            foreach ($dishes as $dish) {
                $order->dishes()->attach($dish->id, [
                    'quantity' => random_int(1, 3),
                    'created_at' => now()
                ]);
            }

        }
    }
}
