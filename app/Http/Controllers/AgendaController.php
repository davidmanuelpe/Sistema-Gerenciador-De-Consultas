<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function create(){
        $medicos = Medico::all();
        return view('recepcionista/agendamedicos', ['medicos' => $medicos]);
        
    }
}
