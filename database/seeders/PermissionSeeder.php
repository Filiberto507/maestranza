<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* permisos */
        permission::create([   
            'name' => 'Vista_taller',
            'guard_name' => 'web'
        ]);

        permission::create([   
            'name' => 'crear_vehiculo',
            'guard_name' => 'web'
        ]);

        permission::create([   
            'name' => 'eliminar_vehiculo',
            'guard_name' => 'web'
        ]);

        permission::create([   
            'name' => 'vista_dependencias',
            'guard_name' => 'web'
        ]);

        permission::create([   
            'name' => 'crear_dependencia',
            'guard_name' => 'web'
        ]);

        permission::create([   
            'name' => 'vista_dash',
            'guard_name' => 'web'
        ]);
        
        permission::create([   
            'name' => 'vista_usuario',
            'guard_name' => 'web'
        ]);

        permission::create([   
            'name' => 'vista_asignar',
            'guard_name' => 'web'
        ]);

        permission::create([   
            'name' => 'vista_roles',
            'guard_name' => 'web'
        ]);
    }
}
