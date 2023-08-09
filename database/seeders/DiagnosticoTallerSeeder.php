<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Taller;
use App\Models\Diagnostico;

class DiagnosticoTallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fechaIngreso = Carbon::parse('2023-02-26');
        $observacion='';
        for ($i = 1; $i <= 40; $i++) {
            $taller = Taller::find( $i);
            $ingreso = $fechaIngreso->addWeek(); // Aumenta un día por cada iteración.
            $kilometraje = 3658 + ($i * 1000); // Aumenta 1000 km por cada iteración.
            
                $tipo_taller = rand(1, 2);

            Diagnostico::create([ 
                'fecha' => $taller->fecha_ingreso,
                'dependencia' => $taller->dependencia,
                'conductor' => $taller->conductor,
                'tipo_taller' => $tipo_taller,
                'observacion' => $observacion,
                'vehiculos_id' => $taller->vehiculo_id,
                'taller_id' => $taller->id      
            ]);
        }
    }
}
