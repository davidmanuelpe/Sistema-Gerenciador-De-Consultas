<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        return [
            'cpf' => Str::random(13),
            'nome' => $this->faker->firstName,
            'email' => $this->faker->unique()->email,
            'senha' => Hash::make('password'),
            'data_nascimento' => $this->faker->date(),
            'pessoaable_type' => 'App\Models\Paciente',
            'pessoaable_id' => 1,
            'endereco' => $this->faker->address
        ];
    }
}