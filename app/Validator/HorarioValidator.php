<?php

namespace App\Validator;

use App\Models\Agenda;
use App\Models\Horario;
use App\Models\Medico;
use Illuminate\Support\Facades\Validator;

class HorarioValidator
{

    public static function validate($data){

        if(isset($data['id'])){
            $horario = Horario::find($data['id']);
        }
        if(isset($data['agenda_id'])){
            $agenda = Agenda::find($data['agenda_id']);
        }

        $validator = Validator::make($data, \App\Models\Horario::$rules, \App\Models\Horario::$messages);

        #Validação de presença, necessário aqui pois o horário inicio e fim são separados em hora e minutos na view

        if(!isset($data['hora_inicio']) || !isset($data['minuto_inicio'])){
            $validator->errors()->add('horario_inicio', 
            'O horario inicial deve ser selecionado');
        }
        if(!isset($data['hora_final']) || !isset($data['minuto_final'])){
            $validator->errors()->add('horario_fim', 
            'O horario final deve ser selecionado');
        }

        foreach($agenda->horarios as $objeto_horario){
        
            #Conversão de String em time
            $hora_inicial = date_parse($objeto_horario->horario_inicio);
            $hora_final = date_parse($objeto_horario->horario_fim);
            $minuto_inicio = $hora_inicial['minute'];
            $minuto_final = $hora_final['minute'];

            $turno = range($hora_inicial['hour'], $hora_final['hour']);

            if(((isset($data['id'])) && ($objeto_horario->id != $horario->id)) || (!(isset($data['id'])))){
                if($data['dia_semana'] == $objeto_horario->dia_semana){
                    #Validação para quando o turno do médico está dentro do range do horário escolhido
                    if(($data['hora_inicio'] < $hora_inicial) && ($data['hora_final'] > $hora_final)){
                        $validator->errors()->add('horario_inicio', 
                        'Não pode ser adicionado à agenda horas em que o médico já trabalha');
                        $validator->errors()->add('horario_fim', 
                        'Não pode ser adicionado à agenda horas em que o médico já trabalha');
                    
                    }
                    #Validação para o horário final é menor que o inicial
                    elseif($data['hora_final'] < $data['hora_inicio']){
                        $validator->errors()->add('horario_inicio', 
                        'O horário final não pode ser mais cedo que o inicial.');
                        $validator->errors()->add('horario_fim', 
                        'O horário final não pode ser mais cedo que o inicial.');
                    }
                }
            }

            foreach($turno as $item){
                    #Validação para quando o horário escolhido está dentro do range do turno do médico
                    if(((isset($data['id'])) && ($objeto_horario->id != $horario->id)) || (!(isset($data['id'])))){
                        if($data['dia_semana'] == $objeto_horario->dia_semana){
                            if($data['hora_inicio'] == $item){
                                if(!(($data['hora_inicio'] == $hora_final) && ($data['minuto_inicio'] > $minuto_final))){
                                    $validator->errors()->add('horario_inicio', 
                                    'Não pode ser adicionado à agenda horas em que o médico já trabalha');
                                }
                            }    
                                
                            if($data['hora_final'] == $item){
                                if(!(($data['hora_final'] == $hora_inicial) && ($data['minuto_final'] < $minuto_inicio))){
                                    $validator->errors()->add('horario_fim', 
                                    'Não pode ser adicionado à agenda horas em que o médico já trabalha');
                                }                
                                
                            }
                        }                
                    }
            }
        }

        if(!$validator->errors()->isEmpty())
        {
            throw new ValidationException($validator, "Erro na validação de Horário");

            return $validator;
        }

    }
}    