<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoleHasPermission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permisos de los roles

        RoleHasPermission::create([ 
            'permission_id' => 1,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 2,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 3,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 4,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 5,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 6,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 7,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 8,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 9,
            'role_id' => 1,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 6,
            'role_id' => 2,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 4,
            'role_id' => 3,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 6,
            'role_id' => 3,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 1,
            'role_id' => 4,
        ]);

        RoleHasPermission::create([ 
            'permission_id' => 6,
            'role_id' => 4,
        ]);
    }
}
