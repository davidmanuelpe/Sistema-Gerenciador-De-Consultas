<?php

namespace Database\Factories;

use App\Models\Agendamentos;
use App\Models\Paciente;
use App\Models\Agenda;
use App\Models\Horario;
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


        $agenda_id = $brasilFaker->randomElement(Agenda::pluck('id', 'id')->toArray());
        $dia_semana = $brasilFaker->randomElement(Horario::where('agenda_id', $agenda_id)->pluck('dia_semana', 'dia_semana')->toArray());
        $horario_inicial = $brasilFaker->randomElement(Horario::where('dia_semana', $dia_semana)->where('agenda_id', $agenda_id)->pluck('horario_inicio', 'horario_inicio')->toArray());
        $horario_final = $brasilFaker->randomElement(Horario::where('dia_semana', $dia_semana)->where('agenda_id', $agenda_id)->where('horario_inicio', $horario_inicial)->pluck('horario_fim', 'horario_fim')->toArray());
        $inicial_convertido = date_parse($horario_inicial);
        $final_convertido = date_parse($horario_final);
        $horario_agendado = range($inicial_convertido['hour'], $final_convertido['hour']);
        $horario = $brasilFaker->randomElement($horario_agendado) . ':' . $final_convertido['minute'] . ':' . '00';
        return [
            'dia_semana' => $dia_semana,
            'horario' => $horario,            
            'data' => $brasilFaker->date('d/m/Y'),
            'agenda_id' => $agenda_id,
            'paciente_id' => $this->faker->randomElement(Paciente::pluck('id', 'id')->toArray())
        ];
    }
}
