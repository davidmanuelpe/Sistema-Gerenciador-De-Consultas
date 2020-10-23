<?php

namespace App\Validator;

use App\Models\Agenda;
use Illuminate\Support\Facades\Validator;

class AgendamentosValidator
{
    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Agendamentos::$rules, \App\Models\Agendamentos::$messages);

        if(isset($data['agenda_id'])){
            $agenda = Agenda::find($data['agenda_id']);
        }

        if(!isset($data['hora']) || !isset($data['minuto'])){
            $validator->errors()->add('horario', 
            'O horario deve ser selecionado');
        }

        $horario = $data['hora'] . ':' . $data['minuto'] . ':' . '00';

        foreach($agenda->agendamentos as $item){
            if($item->dia_semana == $data['dia_semana']){
                if($item->horario == $horario){
                    $validator->errors()->add('horario', 
                    'O horário escolhido já tem alguém marcado');
                }
            }
        }


        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro na validação de Cadastro");

            return $validator;
        }

    }
}