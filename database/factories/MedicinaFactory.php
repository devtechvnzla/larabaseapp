<?php

namespace Database\Factories;

use App\Models\Medicina;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MedicinaFactory extends Factory
{
    protected $model = Medicina::class;

    public function definition()
    {
        return [
			'nu_codigo' => $this->faker->name,
			'nb_nombre' => $this->faker->name,
			'fecha_registo' => $this->faker->name,
			'mes' => $this->faker->name,
			'ano' => $this->faker->name,
			'empresa_id' => $this->faker->name,
			'user_id' => $this->faker->name,
			'categoria_id' => $this->faker->name,
			'nb_presentacion' => $this->faker->name,
			'fe_vencimiento' => $this->faker->name,
			'stock_inicial' => $this->faker->name,
			'stock_alerta' => $this->faker->name,
			'nu_lote' => $this->faker->name,
			'tx_descripcion' => $this->faker->name,
			'nb_marca' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
