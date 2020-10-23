<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agendamentos extends Model
{
    use HasFactory;

    use Notifiable;

    protected $fillable = ['agenda_id', 'paciente_id', 'data', 'horario', 'dia_semana'];

    public static $rules = [
        'agenda_id' => 'required',
        'paciente_id' => 'required'
    ];
    
    public static $messages = [
        'agenda_id.*' => 'O deve referenciar uma agenda de um medico.',
        'paciente_id.*' => 'O deve referenciar um paciente.',

    ];

    public function agenda(){
        return $this->belongsTo('App\Models\Agenda');
    }

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
}
