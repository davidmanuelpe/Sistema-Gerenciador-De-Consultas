<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class MedicoAgendaController extends Controller
{

    public function __construct()
    {
        $this->middleware('medico');
    }

    public function index(){
        return view('medico/agenda');
    }
    public function show($id){
        $horario = Horario::find($id);
        return view('medico/mostrarhorario', ['horario' => $horario]);
    }
}
