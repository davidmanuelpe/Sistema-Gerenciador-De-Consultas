<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public static $rules = ['tipo' => 'required|min:13|max:13'];

    public static $messages = ['tipo.*' => 'tipo deve existir e ter exatamente 6 caracteres'];

    public function funcionario(){
        return $this->morphOne(Funcionario::class, 'funcionarioable');
    }

}
