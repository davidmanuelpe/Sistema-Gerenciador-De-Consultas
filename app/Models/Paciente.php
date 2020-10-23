<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pessoa(){
        return $this->morphOne(Pessoa::class, 'pessoaable');
    }

    public function agendamentos() {
        return $this->hasMany('App\Models\Agendamentos');
    }
}
