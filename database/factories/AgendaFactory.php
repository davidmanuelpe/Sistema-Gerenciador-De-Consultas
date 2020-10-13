<?php

namespace Database\Factories;

use App\Models\Agenda;
use App\Models\Medico;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AgendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agenda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'medico_id' => $this->faker->unique()->randomElement(Medico::pluck('id', 'id')->toArray())
        ];
    }
}
