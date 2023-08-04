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
        for ($i = 0; $i < 20; $i++) {
            $ingreso = $fechaIngreso->addWeek(); // Aumenta un día por cada iteración.
            $kilometraje = 3658 + ($i * 1000); // Aumenta 1000 km por cada iteración.
            $id = $i+1;
            if($i % 2 == 0)
            {
                $tipo_taller = 2;
            }
            else{
                $tipo_taller = 1;
            }
            if($i > 8)
            {
                $conductor = 'GUSTAVO MELENDES CAMACHO';
            }
            else{
                $conductor = 'LUIS BRUNO MONTESINOS VARGAS';
            }

            Diagnostico::create([ 
                'fecha' => $ingreso->format('Y-m-d'), // Formato de fecha 'YYYY-MM-DD'.
                'dependencia' => 'GABINETE',
                'conductor' => $conductor,
                'tipo_taller' => $tipo_taller,
                'vehiculos_id' => 3,
                'taller_id' => $id      
            ]);
        }
    }
}
