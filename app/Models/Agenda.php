<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Agenda extends Model
{
    use HasFactory;

    use Notifiable;

    protected $fillable = ['medico_id'];

    public static $rules = ['medico_id' => 'required'];
    
    public static $messages = ['medico_id.*' => 'O deve referenciar um medico.'];

    public function horarios() {
        return $this->hasMany('App\Models\Horario');
    }

    public function agendamentos() {
        return $this->hasMany('App\Models\Agendamentos');
    }

    public function medico()
    {
        return $this->belongsTo('App\Models\Medico');
    }
}
