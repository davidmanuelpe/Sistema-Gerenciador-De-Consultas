<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function create(){
        $medicos = Medico::all();
        $dias = collect(['Segunda-feira', 'Terça-feira', 'Quarta-feira',
                         'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo']);
        return view('recepcionista/agendamedicos', ['medicos' => $medicos, 'dias' => $dias]);
        
    }
}
