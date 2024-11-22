<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ClientSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(DishSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(DishOrderSeeder::class);

        User::create([
            'name' => 'Admin User',        // Nombre del usuario
            'email' => 'admin@example.com', // Correo electrónico
            'password' => bcrypt('password'), // Contraseña encriptada
        ]);
    }
}
