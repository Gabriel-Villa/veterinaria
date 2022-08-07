<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //ADMIN
        User::create(['name' => "GABRIEL - ADMIN", 'email' => "dev@gmail.com", 'password' => 1234 ])
            ->assignRole('admin');

        //PROVEEDOR
        User::create(['name' => "PROVEEDOR - 1", 'email' => "proveedor1@gmail.com", 'password' => 1234 ])
            ->assignRole('proveedor');
        
        User::create(['name' => "PROVEEDOR - 2", 'email' => "proveedor2@gmail.com", 'password' => 1234 ])
            ->assignRole('proveedor');

        //CLIENTES
        User::create(['name' => "CLIENTE - 1", 'email' => "cliente1@gmail.com", 'password' => 1234 ])
            ->assignRole('cliente');

        User::create(['name' => "CLIENTE - 2", 'email' => "cliente2@gmail.com", 'password' => 1234 ])
            ->assignRole('cliente');   
        
        User::create(['name' => "CLIENTE - 3", 'email' => "cliente3@gmail.com", 'password' => 1234 ])
            ->assignRole('cliente');   
    }
}
