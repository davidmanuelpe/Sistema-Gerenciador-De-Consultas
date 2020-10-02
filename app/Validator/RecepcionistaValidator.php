<?php

namespace App\Validator;

use Illuminate\Support\Facades\Validator;

class RecepcionistaValidator
{
    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Recepcionista::$rules, \App\Models\Recepcionista::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro na validação de Cadastro");

            return $validator;
        }

    }
}