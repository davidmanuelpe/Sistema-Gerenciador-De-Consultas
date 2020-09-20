<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Provider\pt_BR\Person;
use Faker\Generator as Faker;

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
        $tipo=array('App\Models\Paciente', 'App\Models\Funcionario');
        return [
            'cpf' => Str::random(13),
            'nome' => $this->faker->firstName,
            'email' => $this->faker->unique()->email,
            'senha' => Hash::make('password'),
            'data_nascimento' => $this->faker->date(),
            'pessoaable_type' => $tipo[random_int(0, 1)],
            'pessoaable_id' => random_int(1, 5),
            'endereco' => $this->faker->address
        ];
    }
}