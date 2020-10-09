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

        $funcionarioables = [
            \App\Models\Medico::class,
            \App\Models\Recepcionista::class,
            \App\Models\Administrador::class
        ];

        $medico = DB::table('medicos')->count();
        $recepcionista = DB::table('recepcionistas')->count();
        $administradorcont = DB::table('administradors')->count();

        if($administradorcont == 0){
            $funcionarioableType = \App\Models\Administrador::class;
            $funcionarioable = $funcionarioableType::factory()->create();
        }

        if ($medico == 0){
            $funcionarioableType = \App\Models\Medico::class;
            $funcionarioable = $funcionarioableType::factory()->create();
        }
        elseif ($recepcionista == 0){
            $funcionarioableType = \App\Models\Recepcionista::class;
            $funcionarioable = $funcionarioableType::factory()->create();
        }
        else{
            $funcionarioableType = $this->faker->randomElement($funcionarioables);
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
