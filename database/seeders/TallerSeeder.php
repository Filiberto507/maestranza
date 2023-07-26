<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Taller;

class TallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //taller 
        Taller::create([ 
            'ingreso' => '18:44:05',
            'fecha_ingreso' => '2023-07-11',
            'conductor' => 'ROMAN TOMAS MATIAS',
            'vehiculo' => 'SUZUKI',
            'color' => 'AZUL',
            'dependencia' => 'GOBERNACION',
            'placa' => '4756-YUH',
            'kilometraje' => '1526',
            'ordentrabajo' => 'Refacciones a realizar
            cambio de aceite',
            'vehiculo_id' => 2,
            'clase' => 'VAGONETA',
            'tipo_vehiculo' => 'PATROL',         
        ]);

        Taller::create([ 
            'ingreso' => '17:35:51',
            'fecha_ingreso' => '2023-07-11',
            'conductor' => 'LUIS BRUNO MONTESINOS VARGAS',
            'vehiculo' => 'NISSAN',
            'color' => 'ROJO',
            'dependencia' => 'GABINETE',
            'placa' => '3453-CIP',
            'kilometraje' => '3658',
            'ordentrabajo' => 'Refacciones a realizar de las llantas y ventanas',
            'vehiculo_id' => 3,
            'clase' => 'JEEP',
            'tipo_vehiculo' => 'MAZDA',          
        ]);
    }
}
