<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $empresa = new \App\Models\Empresa();
        $empresa->razon_social  = 'DEVTECHVNZLA';
        $empresa->documento     = 'J-25212293-6';
        $empresa->telefono      = '0414-170-84-22';
        $empresa->direccion     = 'San Agustin del Sur, 1era calle de Marin, Sector La cuadrita';
        $empresa->email         = 'devtechvnzla@gmail.com';
        $empresa->logo_empresa  = 'logo.png';
        $empresa->logo_empresa2 = 'logo_mini.png';
        $empresa->is_active    = 1;
        $empresa->save();



        \DB::table('agencias')->insert([

            'code' => uniqid(),
            'name' => 'Caracas',
            'status' => 1,
            'empresa_id' => 1

        ]);
    }
}
