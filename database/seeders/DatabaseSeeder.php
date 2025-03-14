<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Crear los roles
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Cajero']);
        Role::create(['name' => 'Cocina Principal']);
        Role::create(['name' => 'Cocina Antojitos']);
        Role::create(['name' => 'Mesero']);
    }
}