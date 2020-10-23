<?php

namespace App\Http\Controllers;

use App\Models\Agendamentos;
use App\Models\Paciente;
use Illuminate\Http\Request;

class RecepcionistaAgendamentosController extends Controller
{

    public function __construct()
    {
        $this->middleware('recepcionista');
    }

    public function index(){
        $pacientes = Paciente::all();
        return view('recepcionista/agendamentos', ['pacientes' => $pacientes]);
    }

    public function show(Request $request){
        $paciente = Paciente::find($request['paciente_id']);
        return view('recepcionista/mostrar_agendamentos', ['paciente' => $paciente]);
    }

    public function destroy($id){
        Agendamentos::destroy($id);
        return redirect('recepcionista');
    }
}
