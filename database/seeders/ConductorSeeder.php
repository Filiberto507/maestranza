<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conductor;

class ConductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //conductores
        Conductor::create([ 
            'name' => 'Marco Flores',
            'telefono' => '64585469',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'Pedro Rojas',
            'telefono' => '75856545',
            'status' => 'LOCKED',
        ]);

        Conductor::create([ 
            'name' => 'Ronaldo Fuentes',
            'telefono' => '65369636',
            'status' => 'ACTIVE',
        ]);
    }
}
