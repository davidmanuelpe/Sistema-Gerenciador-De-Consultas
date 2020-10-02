<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public static $rules = ['tipo' => 'required|min:6|max:6'];

    public static $messages = ['tipo.*' => 'tipo deve existir e ter exatamente 6 caracteres'];

    public function funcionario(){
        return $this->morphOne(Funcionario::class, 'funcionarioable');
    }
}
