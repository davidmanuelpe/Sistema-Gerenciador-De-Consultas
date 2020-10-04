<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Horario extends Model
{
    use HasFactory;


    use Notifiable;
    protected $fillable = ['horario_inicio', 'horario_fim', 'dia_semana','agenda_id'];

    public static $rules = ['horario_inicio' => 'required|time',
                            'horario_fim' => 'required|time',
                            'dia_semana' => 'required|min:3|max:15',
                            'agenda_id' => 'required', 
                            ];
    
    public static $messages = ['horario_inicio.*' => 'O campo Horario inicio é obrigatório e possui o formato HH:mm:ss.',
                               'horario_fim.*' => 'O campo Horario fim é obrigatório e possui o formato HH:mm:ss.',
                               'dia_semana.*' => 'O campo nome é obrigatório e tem que ter entre 3 e 15 caracteres.',
                               'agenda_id.*' => 'O deve referenciar uma agenda de um medico.',
                                
                            ];

    
    public function agenda(){
        return $this->belongsTo('App\Models\Agenda');
    }
}
