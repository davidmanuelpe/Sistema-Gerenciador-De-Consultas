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

    public static $rules = ['dia_semana' => 'required|min:3|max:15'];
    
    public static $messages = ['dia_semana.*' => 'O campo nome é obrigatório e tem que ter entre 3 e 15 caracteres.'];

    
    public function agenda(){
        return $this->belongsTo('App\Models\Agenda');
    }
}
