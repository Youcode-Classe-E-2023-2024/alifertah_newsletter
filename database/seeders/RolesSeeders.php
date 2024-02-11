<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeders extends Seeder
{
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);

        $permissions = [
            'view newsletter',
            'create newsletter',
            'edit newsletter',
            'delete newsletter',
            'upload media',
            'delete media',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // assign all permissions to admin role
        $roleAdmin->givePermissionTo(Permission::all());


        $roleEditor->givePermissionTo(['view newsletter', 'create newsletter', 'edit newsletter', 'upload media']);
        $roleAdmin->givePermissionTo($permissions);
        
    }
}