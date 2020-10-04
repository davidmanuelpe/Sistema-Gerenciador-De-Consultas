<?php

namespace Database\Factories;

use App\Models\Agendamentos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AgendamentosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agendamentos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brasilFaker = Faker::create("pt_BR");

        return [
            'data' => $brasilFaker->date,
            'agenda_id' => random_int(1, 5),
            'paciente_id' => random_int(1, 5)
        ];
    }
}
