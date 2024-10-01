<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'persona-list',
            'persona-create',
            'persona-edit',
            'persona-delete',
            'proveedor-list',
            'proveedor-create',
            'proveedor-edit',
            'proveedor-delete',
            'cliente-list',
            'cliente-create',
            'cliente-edit',
            'cliente-delete',
            'empleado-list',
            'empleado-create',
            'empleado-edit',
            'empleado-delete',
            'distribuidora-list',
            'distribuidora-create',
            'distribuidora-edit',
            'distribuidora-delete',
         ];
      
         foreach ($permissions as $permission) {
              Permission::firstOrCreate(['name' => $permission]);
         }
    }
}