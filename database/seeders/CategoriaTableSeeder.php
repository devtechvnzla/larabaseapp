<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('categorias')->insert([
            'codigo'     =>  mt_rand(21, 999999),
            'name'       => 'Analgésicos',
            'status'     =>  1,
            'empresa_id' =>  1, 
            'agencia_id' =>  1
        ]);

       \DB::table('categorias')->insert([
            'codigo'     =>  mt_rand(21, 999999),
            'name'       => 'Antialérgicos',
            'status'     =>  1,
            'empresa_id' =>  1, 
            'agencia_id' =>  1
        ]);


       \DB::table('categorias')->insert([
            'codigo'     =>  mt_rand(21, 999999),
            'name'       => 'Antiinflamatorios',
            'status'     =>  1,
            'empresa_id' =>  1, 
            'agencia_id' =>  1
        ]);
    }
}
