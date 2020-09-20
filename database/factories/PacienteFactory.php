<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding Paciente.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the Paciente's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        ];
    }
}
