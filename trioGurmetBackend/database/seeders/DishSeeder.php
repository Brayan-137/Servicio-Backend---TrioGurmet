<?php

namespace Database\Seeders;

use App\Models\Dish;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonDishes = file_get_contents(database_path('json/dishes.json'));
        $dishes = json_decode($jsonDishes, true);

        foreach ($dishes as $dish) {
            Dish::create([
                'name' => $dish['name'],
                'description' => $dish['description'],
                'category' => $dish['category'],
                'image_url' => $dish['imgurl'],
                'price' => $dish['price']
            ]);
        }
    }
}
