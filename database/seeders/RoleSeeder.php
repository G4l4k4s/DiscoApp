<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'administrador', 'description' => 'gestiona todas las operaciones de la discoteca'],

            ['name' => 'administradora de barra', 'description' => 'supervisa y administra el área de la barra'],

            ['name' => 'bartenders', 'description' => 'preparan y sirven bebidas a los clientes'],

            ['name' => 'meser@s', 'description' => 'atienden a los clientes en las mesas y zonas de servicio'],

            ['name' => 'personal de seguridad', 'description' => 'garantizan la seguridad y el orden en el local'],

            ['name' => 'personal de limpieza', 'description' => 'mantienen la limpieza y orden en todas las áreas'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], ['description' => $role['description']]);
        }
    }
}
