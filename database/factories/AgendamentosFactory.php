<?php

namespace Database\Factories;

use App\Models\Agendamentos;
use App\Models\Paciente;
use App\Models\Agenda;
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
            'agenda_id' => $this->faker->unique()->randomElement(Agenda::pluck('id', 'id')->toArray()),
            'paciente_id' => $this->faker->unique()->randomElement(Paciente::pluck('id', 'id')->toArray())
        ];
    }
}
