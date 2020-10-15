<?php

namespace App\Validator;

use Illuminate\Support\Facades\Validator;

class HorarioValidator
{
    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Horario::$rules, \App\Models\Horario::$messages);

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro na validação de Horário");

            return $validator;
        }

    }
}