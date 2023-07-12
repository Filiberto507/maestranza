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

        Conductor::create([ 
            'name' => 'MACARIO MAMANI OLIVERA',
            'telefono' => '65369637',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'RUBEN RODRIGUEZ CHOQUE',
            'telefono' => '65369638',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'SAMUEL SANDOVAL BALDERRAMA',
            'telefono' => '65369639',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'VICTOR GEMIO HERVAS',
            'telefono' => '65369640',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'RENE TOLA COLQUE',
            'telefono' => '65369641',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'AMILCAR DAZA OJEDA',
            'telefono' => '65369642',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'SIXTO MAMANI TOLA',
            'telefono' => '65369643',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'JOSE LUIS HIDALGO',
            'telefono' => '65369644',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'ALEX ARCE',
            'telefono' => '65369645',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'RODRIGO SANCHEZ',
            'telefono' => '65369646',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'ARTURO PAREDES OSORIO',
            'telefono' => '65369647',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'JUAN VILLCA CARI',
            'telefono' => '65369648',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'MAURICIO TORRICO',
            'telefono' => '65369649',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'ALVARO PEREDO LOPEZ',
            'telefono' => '65369650',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'WALTER CHOQUE TOCO',
            'telefono' => '65369651',
            'status' => 'ACTIVE',
        ]);

        Conductor::create([ 
            'name' => 'GUSTAVO MELENDES CAMACHO',
            'telefono' => '65369652',
            'status' => 'ACTIVE',
        ]);
    }
}
