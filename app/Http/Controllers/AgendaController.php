<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Horario;
use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Validator\HorarioValidator;

class AgendaController extends Controller
{

    public function __construct()
    {
        $this->middleware('recepcionista');
    }

    public function create(){
        $medicos = Medico::all();
        $dias = collect(['Segunda-feira', 'Terça-feira', 'Quarta-feira',
                         'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo']);
        return view('recepcionista/agendamedicos', ['medicos' => $medicos, 'dias' => $dias]);
        
    }

    protected function store(Request $request){
        try{

            HorarioValidator::validate($request->all());
            $inicio = $request['hora_inicio'] . ':' . $request['minuto_inicio'] . ':' . '00';
            $final = $request['hora_final'] . ':' . $request['minuto_final'] . ':' . '00';
            
            Horario::create([
                'horario_inicio' => $inicio,
                'horario_fim' => $final,
                'dia_semana' => $request['dia_semana'],
                'agenda_id' => $request['agenda_id']
            ]);
            return redirect('recepcionista');
        }
        catch(\App\Validator\ValidationException $exception){
            $medicos = Medico::all();
            $dias = collect(['Segunda-feira', 'Terça-feira', 'Quarta-feira',
                         'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo']);
            return view('recepcionista/agendamedicos', ['medicos' => $medicos, 'dias' => $dias])
            ->withErrors($exception->getValidator());
        }
    }
}
