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

    static $password; 

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

        
        $funcionariocont = DB::table('funcionarios')->count();
        $pacientecont = DB::table('pacientes')->count();
        $admincont = DB::table('administradors')->count();

        if ($admincont == 0){
            
            $password = Hash::make("admin");
            $pessoaableType = \App\Models\Administrador::create(['tipo' => 'administrador']);
            $funcionario = $pessoaableType->funcionario()->create(['carga_horaria' => '4 horas', 'tipo' => 'funcionario']);
            $funcionario->pessoa()->create(['cpf' => '107.850.264-10', 'name' => 'Admin', 'sobrenome' => 'Manuel', 'data_nascimento' => '22/12/1994', 'endereco' => 'Marechal Deodoro, 115', 'email' => 'Admin@gmail.com', 'password' => $password]);
        }
        
        
        if ($pacientecont == 0){
            $pessoaableType = \App\Models\Paciente::class;
            $pessoaable = $pessoaableType::factory()->create();     
        }
        elseif ($funcionariocont <= 11){
            $pessoaableType = \App\Models\Funcionario::class;
            $pessoaable = $pessoaableType::factory()->create();
        }
        else{
            $pessoaableType = $this->faker->randomElement($pessoaables);
            $pessoaable = $pessoaableType::factory()->create();
        }
        
        $randomMes = (string)(random_int(1, 12));
        if ($randomMes < 10){
            $randomMes = '0' . $randomMes;
        }
        $randomDia = (string) (random_int(1, 30));
        if ($randomDia < 10){
            $randomDia = '0' . $randomDia;
        }

        return [
            'cpf' => $brasilFaker->cpf,
            'name' => $brasilFaker->firstName,
            'sobrenome' => $brasilFaker->lastName,
            'email' => $brasilFaker->unique()->email,
            'password' => Hash::make('password'),
            'data_nascimento' => $randomDia .'/'. $randomMes . '/' .((string)(random_int(1930, 2015))),
            'pessoaable_type' => $pessoaableType,
            'pessoaable_id' => $pessoaable->id,
            'endereco' => $brasilFaker->address
        ];
    }
}