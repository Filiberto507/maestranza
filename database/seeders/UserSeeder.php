<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creacion de usuarios
        User::create([
            'name' => 'Administrador',
            'phone' => '78896354',
            'email' => 'admin@gmail.com',
            'profile' => 'Admin',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);
        
        User::create([
            'name' => 'Grover Angel Solares Baltazar',
            'phone' => '78896369',
            'email' => 'grover@gmail.com',
            'profile' => 'Responsable de Transporte',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Rodrigo Sánchez Gamboa',
            'phone' => '78896385',
            'email' => 'rodrigo@gmail.com',
            'profile' => 'Tecnico-Mecanico',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);
        User::create([
            'name' => 'Sergio Pinto Lacato',
            'phone' => '78896385',
            'email' => 'sergio@gmail.com',
            'profile' => 'Tecnico-Mecanico',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);
    }
}
