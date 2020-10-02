<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    
    protected $fillable = ['carga_horaria', 'tipo', 'funcionarioable_type', 'funcionarioable_id'];

    public static $rules = ['carga_horaria' => 'required',
                            'tipo' => 'required|min:11|max:11',
                            'funcionarioable_type' => 'required|min:12', 
                            'funcionarioable_id' => 'required'];

    public static $messages = ['carga_horaria.*' => 'O campo de carga horário é obrigatório',
                               'tipo.*' => 'O campo de cargo é obrigatório',
                               'funcionarioable_type.*' => 'Tipo de funcionário deve existir', 
                               'funcionarioable_id.*' => 'id de funcionário deve existir'];

    public function pessoa(){
        return $this->morphOne(Pessoa::class, 'pessoaable');
    }

    public function funcionarioable(){
        return $this->morphTo();
    }
}
