<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'documento' => $this->faker->name,
			'telefono' => $this->faker->name,
			'licencia_colegio_medico' => $this->faker->name,
			'licencia_mpps' => $this->faker->name,
			'fecha_nacimiento' => $this->faker->name,
			'edad' => $this->faker->name,
			'status' => $this->faker->name,
			'empresa_id' => $this->faker->name,
			'especialista_id' => $this->faker->name,
			'agencia_id' => $this->faker->name,
        ];
    }
}
