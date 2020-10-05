<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PessoaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pessoa::class;

    

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brasilFaker = Faker::create("pt_BR");


        $pessoaables = [
            \App\Models\Paciente::class,
            \App\Models\Funcionario::class,
        ];

        
        $funcionario = DB::table('funcionarios')->count();
        $paciente = DB::table('pacientes')->count();

        if ($paciente == 0){
            $pessoaableType = \App\Models\Paciente::class;
            $pessoaable = $pessoaableType::factory()->create();     
        }
        elseif ($funcionario == 0 || $funcionario == 1){
            $pessoaableType = \App\Models\Funcionario::class;
            $pessoaable = $pessoaableType::factory()->create();
        }
        else{
            $pessoaableType = $this->faker->randomElement($pessoaables);
            $pessoaable = $pessoaableType::factory()->create();
        }
        


        return [
            'cpf' => $brasilFaker->cpf,
            'nome' => $brasilFaker->firstName,
            'sobrenome' => $brasilFaker->lastName,
            'email' => $brasilFaker->unique()->email,
            'senha' => Hash::make('password'),
            'data_nascimento' => ((string) (random_int(1, 30))) .'/'. ((string)(random_int(1, 12))) . '/' .((string)(random_int(1930, 2015))),
            'pessoaable_type' => $pessoaableType,
            'pessoaable_id' => $pessoaable->id,
            'endereco' => $brasilFaker->address
        ];
    }
}