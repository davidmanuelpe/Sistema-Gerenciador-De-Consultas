<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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

        $tipo=array('App\Models\Paciente', 'App\Models\Funcionario');
        return [
            'cpf' => $brasilFaker->cpf,
            'nome' => $brasilFaker->firstName,
            'sobrenome' => $brasilFaker->lastName,
            'email' => $brasilFaker->unique()->email,
            'senha' => Hash::make('password'),
            'data_nascimento' => ((string) (random_int(1, 30))) .'/'. ((string)(random_int(1, 12))) . '/' .((string)(random_int(1930, 2015))),
            'pessoaable_type' => $tipo[random_int(0, 1)],
            'pessoaable_id' => random_int(1, 5),
            'endereco' => $brasilFaker->address
        ];
    }
}