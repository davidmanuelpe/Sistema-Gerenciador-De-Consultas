<?php

namespace Tests\Unit;

use App\Models\Agenda;
use App\Models\Horario;
use App\Models\Pessoa;
use App\Models\Medico;
use App\Models\Recepcionista;
use App\Models\Administrador;
use App\Models\Funcionario;
use App\Validator\HorarioValidator;
use App\Validator\ValidationException;
use tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HorarioValidatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHorarioSemDiaDaSemana()
    {
        
        $this->expectException(ValidationException::class);
        Administrador::factory()->create();
        Medico::factory()->count(10)->create();
        Recepcionista::factory()->count(5)->create();
        Funcionario::factory()->create();
        Funcionario::factory()->count(10)->create();
        Funcionario::factory()->count(5)->create();
        $pessoa = Pessoa::factory()->count(4)->create();
        $pessoa = Pessoa::factory()->count(16)->create();
        $agenda = Agenda::factory()->count(5)->create();
        $agenda = Agenda::factory()->count(5)->create();
        $horario = Horario::factory()->make(['dia_semana' => '']);
        HorarioValidator::validate($horario->toArray());
    }

    public function testHorarioCorreto()
    {
        Administrador::factory()->create();
        Medico::factory()->count(10)->create();
        Recepcionista::factory()->count(5)->create();
        Funcionario::factory()->create();
        Funcionario::factory()->count(10)->create();
        Funcionario::factory()->count(5)->create();
        $pessoa = Pessoa::factory()->count(4)->create();
        $pessoa = Pessoa::factory()->count(16)->create();
        $agenda = Agenda::factory()->count(5)->create();
        $horario = Horario::factory()->make();
        $dados = $horario->toArray();
        HorarioValidator::validate($dados);
        $this->assertTrue(true);
    }
}
