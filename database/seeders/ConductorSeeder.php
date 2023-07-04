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

        //GOBERNACION
        Conductor::create([ 
            'name' => 'ROMAN TOMAS MATIAS',
            'telefono' => '64585469',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'WILIAN SANCHEZ CABRERA',
            'telefono' => '64585469',
            'status' => 'LOCKED',
        ]);
        //GABINETE
        Conductor::create([ 
            'name' => 'FRANKLIN VALLEJOS FERNANDEZ',
            'telefono' => '75856545',
            'status' => 'ACTIVE',
        ]);
        //ASESORIA DE GESTION INSTITUCIONAL Y RELACIONAMIENTO
        Conductor::create([ 
            'name' => 'LUIS BRUNO MONTESINOS VARGAS',
            'telefono' => '65369636',
            'status' => 'ACTIVE',
        ]);
    }
}
