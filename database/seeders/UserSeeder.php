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
            'name' => 'Rodrigo Van',
            'phone' => '78896354',
            'email' => 'rodrigov@gmail.com',
            'profile' => 'Admin',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);
        
        User::create([
            'name' => 'Fabiana Mendez',
            'phone' => '78896369',
            'email' => 'fabim@gmail.com',
            'profile' => 'Empleado',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);
    }
}
