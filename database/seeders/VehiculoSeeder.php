<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculos;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vehiculos
        Vehiculos::create([   
            'placa' => '3453-CUX',
            'modelo' => '2014',
            'marca' => 'NISSAN',
            'color' => 'BEIGE',
            'dependencias_id' => '1'
        ]);
        
        /*Vehiculos::create([   
            'placa' => '',
            'modelo' => '',
            'marca' => '',
            'color' => '',
            'dependencias_id' => ''
        ]);

        Vehiculos::create([   
            'placa' => '',
            'modelo' => '',
            'marca' => '',
            'color' => '',
            'dependencias_id' => ''
        ]);

        Vehiculos::create([   
            'placa' => '',
            'modelo' => '',
            'marca' => '',
            'color' => '',
            'dependencias_id' => ''
        ]);*/
        //gabinete
        Vehiculos::create([   
            'placa' => '4756-YUH',
            'modelo' => '2018',
            'marca' => 'SUZUKI',
            'color' => 'AZUL',
            'dependencias_id' => '2'
        ]);
        //ASESORIA DE GESTION INSTITUCIONAL Y RELACIONAMIENTO
        Vehiculos::create([   
            'placa' => '3453-CIP',
            'modelo' => '2013',
            'marca' => 'NISSAN',
            'color' => 'ROJO',
            'dependencias_id' => '3'
        ]);

        
    }
}
