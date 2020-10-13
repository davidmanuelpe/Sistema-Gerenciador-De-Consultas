<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public static $rules = ['tipo' => 'required|min:6|max:6',
                            'carga_horaria' => 'required|min:7|max:7'];

    public static $messages = ['tipo.*' => 'tipo deve existir e ter exatamente 6 caracteres',
                               'carga_horaria.*' => 'a carga horária deve existir e ter formato x horas' ];

    public function funcionario(){
        return $this->morphOne(Funcionario::class, 'funcionarioable');
    }

    public function agenda() {
        return $this->hasOne('App\Models\Agenda');
    }
}
