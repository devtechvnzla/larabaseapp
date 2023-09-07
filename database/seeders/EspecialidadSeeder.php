<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $especialidades = [

            [
                'name' => 'Anestesiología',
                'created_at' => now()
            ],
            [
                'name' => 'Anatomía Patológica.',
                'created_at' => now()
            ],
            [
                'name' => 'Cardiología Clínica.',
                'created_at' => now()
            ],
            [
                'name' => 'Cardiología Intervencionista.',
                'created_at' => now()
            ],
            [
                'name' => 'Cirugía Pediátrica.',
                'created_at' => now()
            ],
            [
                'name' => 'Cirugía General.',
                'created_at' => now()
            ],
            [
                'name' => 'Cirugía Plástica y Reconstructiva.',
                'created_at' => now()
            ],
            [
                'name' => 'Angiología y Cirugía Vascular y Endovascular.',
                'created_at' => now()
            ],
            [
                'name' => 'Dermatología',
                'created_at' => now()
            ],
            [
                'name' => 'Endoscopia del Aparato Digestivo.',
                'created_at' => now()
            ],
            [
                'name' => 'Gastroenterología',
                'created_at' => now()
            ],
            [
                'name' => 'Ginegología y Obstetricia.',
                'created_at' => now()
            ],
            [
                'name' => 'Hematología',
                'created_at' => now()
            ],
            [
                'name' => 'Infectología de Adulto.',
                'created_at' => now()
            ],
            [
                'name' => 'Medicina Aeroespacial.',
                'created_at' => now()
            ],
            [
                'name' => 'Medicina de Rehabilitación.',
                'created_at' => now()
            ],
            [
                'name' => 'Medicina Interna.',
                'created_at' => now()
            ],
            [
                'name' => 'Nefrología',
                'created_at' => now()
            ],
            [
                'name' => 'Neurología de Adultos',
                'created_at' => now()
            ],
            [
                'name' => 'Neumología',
                'created_at' => now()
            ],
            [
                'name' => 'Oftalmología',
                'created_at' => now()
            ],
            [
                'name' => 'Ortopedia.',
                'created_at' => now()
            ],
            [
                'name' => 'Otorrinolaringología.',
                'created_at' => now()
            ],
            [
                'name' => 'Patología Clínica.',
                'created_at' => now()
            ],
            [
                'name' => 'Pediatría.',
                'created_at' => now()
            ],
            [
                'name' => 'Psiquiatría General.',
                'created_at' => now()
            ],
            [
                'name' => 'Radiología e Imagen.',
                'created_at' => now()
            ],
            [
                'name' => 'Medicina Crítica.',
                'created_at' => now()
            ],
            [
                'name' => 'Urología',
                'created_at' => now()
            ],
            [
                'name' => 'Neumología.',
                'created_at' => now()
            ],
            [
                'name' => 'Cirugía Oncológica..',
                'created_at' => now()
            ],
            [
                'name' => 'Oncología Médica..',
                'created_at' => now()
            ],
            [
                'name' => 'Oncología Pediátrica..',
                'created_at' => now()
            ],
            [
                'name' => 'Radio-Oncología.',
                'created_at' => now()
            ],
            [
                'name' => 'Cirugía Neurológica.',
                'created_at' => now()
            ],
        ];

        $tratamiento = [
            [
                'name' => 'Subcutánea',
                'created_at' => now()
            ],
            [
                'name' => 'Intramuscular',
                'created_at' => now()
            ],
            [
                'name' => 'Intravenosa',
                'created_at' => now()
            ],
            [
                'name' => 'Intratecal',
                'created_at' => now()
            ],
        ];


        $categorias = [
            [
                'nb_nombre' => 'MEDICINA GENERAL',
                'created_at' => now()
            ],

        ];



        \App\Models\TipoTratamiento::insert($tratamiento);
        \App\Models\Especialidad::insert($especialidades);
        \App\Models\Categoria::insert($categorias);

        \DB::table('configuracion_generals')->insert([
            'serie' => '001' ,
            'correlativo' =>'0000000' ,
            'empresa_id' => 1,
        ]);

        \DB::table('tipo_atencion')->insert([

            'name' => 'Colocación de tratamiento',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);

        \DB::table('tipo_atencion')->insert([

            'name' => 'Medición de glicemia',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);

         \DB::table('tipo_atencion')->insert([

            'name' => 'Electrocardiograma',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);

          \DB::table('tipo_atencion')->insert([

            'name' => 'Medición de glucemia',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);

        \DB::table('tipo_atencion')->insert([

            'name' => 'Medición de tensión arterial',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);

         \DB::table('tipo_atencion')->insert([

            'name' => 'Jornada',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);

        \DB::table('jornadas')->insert([

            'name' => 'Ozonoterapia ',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);

        \DB::table('jornadas')->insert([

            'name' => 'Implantes ',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);

        \DB::table('jornadas')->insert([

            'name' => 'Laboratorio ',
            'status' => 1,
            'empresa_id' =>1 ,
            'user_id' =>1 ,
        ]);


    }
}
