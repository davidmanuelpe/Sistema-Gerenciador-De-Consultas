<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $guarded = [];
    

    public function pessoaable(){
        return $this->morphTo();
    }

    #protected $casts = [
    #    'endereco' => 'array'
    #];
}
