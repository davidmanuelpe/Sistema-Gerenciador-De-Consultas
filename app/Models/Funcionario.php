<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    
    protected $fillable = ['carga_horaria', 'tipo', 'funcionarioable_type', 'funcionarioable_id'];

    public static $rules = ['carga_horaria' => 'min:0|max:7',
                            'cpf' => 'required|cpf|unique:pessoas',
                            'name' => 'required|min:3|max:50',
                            'sobrenome' => 'required|min:3|max:50',
                            'data_nascimento' => 'required|data', 
                            'endereco' => 'required|min:10|max:100',
                            'email' => 'required|email|unique:pessoas',
                            'password' => 'required|min:8|confirmed',
                            'pessoaable_type' => 'required',];

    public static $messages = ['carga_horaria.*' => 'O campo de carga horário precisa estar entre 0 e 7 caractéres',
                               'cpf.*' => 'O campo CPF é obrigatório e possui o formato (999.999.999-99), e não pode já estar cadastrado no sistema.',
                               'name.*' => 'O campo nome é obrigatório e tem que ter entre 3 e 50 caracteres.',
                               'sobrenome.*' => 'O campo sobrenome é obrigatório e tem que ter entre 3 e 50 caracteres.',
                               'data_nascimento.*' => 'O campo de data de nascimento é obrigatório e tem o formato DD/MM/AAAA.',
                               'endereco.*' => 'O campo endereco é obrigatório e tem que ter entre 10 e 100 caracteres.',
                               'email.*' => 'O campo email é obrigatório, não pode ser um email já cadastrado no sistema e possui o formato email@email.com.',
                               'password.require|password.min' => 'O campo de senha é obrigatório e deve ter no mínimo 8 caracteres.',
                               'password.confirmed' => 'O campos de senha e confirmação de senha devem ser iguais.',
                               'pessoaable_type.*' => 'O tipo de Acesso deve ser selecionado',];

    public function pessoa(){
        return $this->morphOne(Pessoa::class, 'pessoaable');
    }

    public function funcionarioable(){
        return $this->morphTo();
    }
}
