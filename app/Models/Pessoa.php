<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pessoa extends Authenticatable
{
    use HasFactory;

    use Notifiable;
    protected $fillable = ['cpf', 'name', 'sobrenome','data_nascimento', 'pessoaable_type' , 'pessoaable_id' , 'endereco' , 'email' , 'password'];

    public static $rules = ['cpf' => 'required|cpf|unique:pessoas',
                            'name' => 'required|min:3|max:50',
                            'sobrenome' => 'required|min:3|max:50',
                            'data_nascimento' => 'required|data', 
                            'endereco' => 'required|min:10|max:100',
                            'email' => 'required|email|unique:pessoas',
                            'password' => 'required|min:8|confirmed',
                            'pessoaable_type' => 'required',
                            'pessoaable_id' => 'required'];
    
    public static $messages = ['cpf.*' => 'O campo CPF é obrigatório e possui o formato (999.999.999-99), e não pode já estar cadastrado no sistema.',
                               'name.*' => 'O campo nome é obrigatório e tem que ter entre 3 e 50 caracteres.',
                               'sobrenome.*' => 'O campo sobrenome é obrigatório e tem que ter entre 3 e 50 caracteres.',
                               'data_nascimento.*' => 'O campo de data de nascimento é obrigatório e tem o formato DD/MM/AAAA.',
                               'endereco.*' => 'O campo endereco é obrigatório e tem que ter entre 10 e 100 caracteres.',
                               'email.*' => 'O campo email é obrigatório, não pode ser um email já cadastrado no sistema e possui o formato email@email.com.',
                               'password.require|password.min' => 'O campo de senha é obrigatório e deve ter no mínimo 8 caracteres.',
                               'password.confirmed' => 'O campos de senha e confirmação de senha devem ser iguais.'];

    
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function pessoaable(){
        return $this->morphTo();
    }

    #protected $casts = [
    #    'endereco' => 'array'
    #];
}
