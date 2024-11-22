<?php

namespace Database\Seeders;

use App\Models\Employee;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory(10)->create();

        Employee::create([
            'name' => 'Employee User',        // Nombre del usuario
            'email' => 'employee@example.com', // Correo electrónico
            'password' => '12345678', // Contraseña encriptada
        ]);
    }
}
