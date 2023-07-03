<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //creacion de roles
         Role::create([
            'name' => 'Admin',
            
        ]);
        
        Role::create([
            'name' => 'Empleado',
            
        ]);

        Role::create([
            'name' => 'Responsable de Transporte',
            
        ]);


        Role::create([
            'name' => 'Tecnico-Mecanico',
            
        ]);
    }
}
