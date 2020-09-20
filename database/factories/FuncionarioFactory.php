<?php

namespace Database\Factories;

use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FuncionarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Funcionario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'carga_horaria' => $this->faker->time(),
            'tipo' => "funcionario",
            'funcionarioable_type' => 'App\Models\Recepcionista',
            'funcionarioable_id' => random_int(1, 5)
        ];
    }
}
