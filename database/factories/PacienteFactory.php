<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
			'tx_nombres' => $this->faker->name,
			'nu_cedula' => $this->faker->name,
			'tx_direccion' => $this->faker->name,
			'nu_edad' => $this->faker->name,
			'nu_telefono' => $this->faker->name,
			'fe_nacimiento' => $this->faker->name,
			'genero' => $this->faker->name,
			'status' => $this->faker->name,
			'empresa_id' => $this->faker->name,
			'agencia_id' => $this->faker->name,
        ];
    }
}
