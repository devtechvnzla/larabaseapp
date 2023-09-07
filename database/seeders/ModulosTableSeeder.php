<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('modulos')->insert([

            'name' => 'Usuarios'
        ]);

        \DB::table('modulos')->insert([

            'name' => 'Roles'
        ]);

        \DB::table('modulos')->insert([

            'name' => 'Permisos'
        ]);

        \DB::table('modulos')->insert([

            'name' => 'Agencias'
        ]);

        \DB::table('modulos')->insert([

            'name' => 'Empresas'
        ]);

    }
}
