<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition()
    {
        return [
			'codigo' => $this->faker->name,
			'name' => $this->faker->name,
			'status' => $this->faker->name,
			'empresa_id' => $this->faker->name,
			'agencia_id' => $this->faker->name,
        ];
    }
}
