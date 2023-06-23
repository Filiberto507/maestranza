<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\accesoriostaller;
class AccesoriostallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crear accesorios
        accesoriostaller::create([
            'name' => 'Llave',
            
        ]);
        accesoriostaller::create([
            'name' => 'Faroles',
            
        ]);
        accesoriostaller::create([
            'name' => 'Gata',
            
        ]);
        accesoriostaller::create([
            'name' => 'Control Alarma',
            
        ]);
        accesoriostaller::create([
            'name' => 'Guiñadores',
            
        ]);
        accesoriostaller::create([
            'name' => 'Manivela',
            
        ]);
        accesoriostaller::create([
            'name' => 'Radio/TC/CD',
            
        ]);
        accesoriostaller::create([
            'name' => 'Halógenos',
            
        ]);
        accesoriostaller::create([
            'name' => 'Llave de Ruedas',
            
        ]);
        accesoriostaller::create([
            'name' => 'Parlantes',
            
        ]);
        accesoriostaller::create([
            'name' => 'Guinche',
            
        ]);
        accesoriostaller::create([
            'name' => 'Estuche de Herramientas',
            
        ]);
        accesoriostaller::create([
            'name' => 'Encendedor',
            
        ]);
        accesoriostaller::create([
            'name' => 'Tapacubos',
            
        ]);
        accesoriostaller::create([
            'name' => 'Stops',
            
        ]);
        accesoriostaller::create([
            'name' => 'Manuales',
            
        ]);
        accesoriostaller::create([
            'name' => 'Parrilla',
            
        ]);
        accesoriostaller::create([
            'name' => 'Luz de Placa',
            
        ]);
        accesoriostaller::create([
            'name' => 'Tapasol',
            
        ]);
        accesoriostaller::create([
            'name' => 'Limpia Parabrisas',
            
        ]);
    }
}
