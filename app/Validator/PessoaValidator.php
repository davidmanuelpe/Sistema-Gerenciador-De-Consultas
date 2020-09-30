<?php

namespace App\Validator;

use Illuminate\Support\Facades\Validator;

class PessoaValidator
{
    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Pessoa::$rules, \App\Models\Pessoa::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro na validação de Cadastro");

            return $validator;
        }

    }
}