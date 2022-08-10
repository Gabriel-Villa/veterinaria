<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = Role::create(['name' => 'admin']);
        $proveedor = Role::create(['name' => 'proveedor']);
        $cliente = Role::create(['name' => 'cliente']);
        
        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $proveedor]);
        
        Permission::create(['name' => 'categoria.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'categoria.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'categoria.edit'])->syncRoles([$admin]);

        Permission::create(['name' => 'producto.index'])->syncRoles([$admin, $proveedor]);
        Permission::create(['name' => 'producto.create'])->syncRoles([$admin, $proveedor]);
        Permission::create(['name' => 'producto.edit'])->syncRoles([$admin, $proveedor]);

        Permission::create(['name' => 'orden.index'])->syncRoles([$admin, $proveedor]);
        Permission::create(['name' => 'orden.create'])->syncRoles([$admin, $proveedor]);
        Permission::create(['name' => 'orden.edit'])->syncRoles([$admin, $proveedor]);

        Permission::create(['name' => 'feedback.index'])->syncRoles([$admin, $proveedor]);
        
    }
}
