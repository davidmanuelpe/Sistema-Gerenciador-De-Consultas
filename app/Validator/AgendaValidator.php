<?php

namespace App\Validator;

use Illuminate\Support\Facades\Validator;

class AgendaValidator
{
    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Agenda::$rules, \App\Models\Agenda::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro na validação de Cadastro");

            return $validator;
        }

    }
}