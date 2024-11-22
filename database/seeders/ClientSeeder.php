<?php

namespace Database\Seeders;

use App\Models\Client;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory(10)->create();

        Client::create([
            'name' => 'Client User',                 // Nombre del usuario
            'email' => 'client@example.com',         // Correo electrónico
            'password' => '12345678',       // Contraseña encriptada
            'address' => '123 Main Street',         // Dirección requerida
            'phone_number' => '1234567890',       // Número de teléfono requerido
            'created_at' => now(),                  // Fecha de creación
            'updated_at' => now(),
        ]);
    }
}
