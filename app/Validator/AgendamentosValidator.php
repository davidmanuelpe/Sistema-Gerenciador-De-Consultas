<?php

namespace App\Validator;

use Illuminate\Support\Facades\Validator;

class AgendamentosValidator
{
    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Agendamentos::$rules, \App\Models\Agendamentos::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro na validação de Cadastro");

            return $validator;
        }

    }
}