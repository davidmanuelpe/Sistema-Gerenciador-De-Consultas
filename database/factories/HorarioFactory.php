<?php

namespace Database\Factories;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class HorarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Horario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brasilFaker = Faker::create("pt_BR");

        return [
            'horario_inicio' => $brasilFaker->time($format = 'H:i:s', $min='now'),
            'horario_fim' => $brasilFaker->time($format = 'H:i:s', $min='horario_inicio'),
            'dia_semana' => $brasilFaker->dayOfWeek,
            'agenda_id' => random_int(1, 5)
        ];
    }
}
