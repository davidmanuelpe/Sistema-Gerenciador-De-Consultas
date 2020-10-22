<?php

namespace Database\Factories;

use App\Models\Horario;
use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

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


        $dias_da_semana = [
            'Segunda-feira', 'Terça-feira', 'Quarta-feira',
            'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'
        ];


        $minutos = ['00','15', '30', '45'];

        $brasilFaker = Faker::create("pt_BR");

        $inicio = Carbon::createFromTime($brasilFaker->numberBetween( 0, 15 ), $brasilFaker->randomElement($minutos), 0);
        $fim = Carbon::createFromFormat('Y-m-d H:i:s', $inicio)->addHours($brasilFaker->numberBetween( 1, 8 ));

        return [
            'horario_inicio' => (substr((string)($inicio), 11, 8)),
            'horario_fim' => (substr((string)($fim), 11, 8)),
            'dia_semana' => $brasilFaker->randomElement($dias_da_semana),
            'agenda_id' => $this->faker->randomElement(Agenda::pluck('id', 'id')->toArray())
        ];
    }
}
