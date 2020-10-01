<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepcionista extends Model
{
    use HasFactory;
    
    protected $fillable = ['tipo'];

    public static $rules = ['tipo' => 'required|min:13|max:13'];

    public static $messages = ['tipo.*' => 'O tipo deve existir'];

    public function funcionario(){
        return $this->morphOne(Funcionario::class, 'funcionarioable');
    }
}
