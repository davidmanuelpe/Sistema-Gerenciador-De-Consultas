<?php

namespace Database\Factories;

use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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

        $medico = DB::table('medicos')->count();
              
        if ($medico < 10){
            $funcionarioableType = \App\Models\Medico::class;
            $funcionarioable = $funcionarioableType::factory()->create();
        }
        else{
            $funcionarioableType = \App\Models\Recepcionista::class;
            $funcionarioable = $funcionarioableType::factory()->create();
        }




        return [
            'carga_horaria' => $this->faker->time(),
            'tipo' => "funcionario",
            'funcionarioable_type' => $funcionarioableType,
            'funcionarioable_id' => $funcionarioable->id
        ];
    }
}
