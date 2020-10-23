<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Agendamentos;
use App\Models\Medico;
use App\Validator\AgendamentosValidator;
use App\Validator\DiaSemanaValidator;
use App\Validator\NomeMedicoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $medicos = Medico::all();
        return view('paciente/agendamentos/agendamentos_medicos', ['medicos' => $medicos]);
    }
    public function medicos(Request $request)
    {
        try{

        NomeMedicoValidator::validate($request->all());
        $dias_unicos = [];
        $medico = Medico::find($request['medico_id']);
        foreach($medico->agenda->horarios as $item){
            if(!(in_array($item->dia_semana, $dias_unicos))){
                $dias_unicos[] = $item->dia_semana;
            }
        }
        return view('paciente/agendamentos/dias', ['dias_unicos' => $dias_unicos, 'medico' => $medico]);
        }
        catch(\App\Validator\ValidationException $exception){
            $medicos = Medico::all();
            return view('paciente/agendamentos/agendamentos_medicos', ['medicos' => $medicos])
            ->withErrors($exception->getValidator());
        }
    }
    public function create(Request $request){

        try{

            DiaSemanaValidator::validate($request->all());
            $horarios_medico_dia = [];
            $dia_semana = $request['dia_semana'];
            $medico = Medico::find($request['medico_id']);
            foreach($medico->agenda->horarios as $item){
                if($item->dia_semana == $dia_semana){

                    $hora_inicial = date_parse($item->horario_inicio);
                    $hora_final = date_parse($item->horario_fim);

                    $turno = range($hora_inicial['hour'], $hora_final['hour']);
                    foreach($turno as $horas)
                    $horarios_medico_dia[] = $horas;
                }
            }
            sort($horarios_medico_dia);   
            $minutos = ['15', '30', '45'];
            return view('paciente/agendamentos/agendar', ['dia_semana' => $dia_semana, 'medico' => $medico, 'minutos' => $minutos, 'horarios_medico_dia' => $horarios_medico_dia]);
        }
        catch(\App\Validator\ValidationException $exception){
            $dias_unicos = [];
            $medico = Medico::find($request['medico_id']);
            foreach($medico->agenda->horarios as $item){
                if(!(in_array($item->dia_semana, $dias_unicos))){
                    $dias_unicos[] = $item->dia_semana;
                    }
            }
            return view('paciente/agendamentos/dias', ['dias_unicos' => $dias_unicos, 'medico' => $medico])
            ->withErrors($exception->getValidator());
        }
    }

    public function store(Request $request){
        try{

            AgendamentosValidator::validate($request->all());

            $data = 'Sexta-Feira';

        switch($request['dia_semana']){
            case 'Domingo':
                $data = date('d/m/Y', strtotime("next Sunday"));
                break;
            case 'Segunda-feira':
                $data = date('d/m/Y', strtotime("next Monday"));
                break;
            case 'Terce-feira':
                $data = date('d/m/Y', strtotime("next Tuesday"));
                break;
            case 'Quarta-feira':
                $data = date('d/m/Y', strtotime("next Wednesday"));
                break;
            case 'Quinta-feira':
                $data = date('d/m/Y', strtotime("next Thursday"));
                break;
            case 'Sexta-feira':
                $data = date('d/m/Y', strtotime("next Friday"));
                break;
            case 'Sábado':
                $data = date('d/m/Y', strtotime("next Saturday"));
                break;            
        }
 
            $horario = $request['hora'] . ':' . $request['minuto'] . ':' . '00';
                    
            Agendamentos::create([
                'data' => $data,
                'horario' => $horario,
                'paciente_id' => $request['paciente_id'],
                'dia_semana' => $request['dia_semana'],
                'agenda_id' => $request['agenda_id']
            ]);
            return redirect('paciente');
        }
        catch(\App\Validator\ValidationException $exception){
        $horarios_medico_dia = [];
        $dia_semana = $request['dia_semana'];
        $agenda = Agenda::find($request['agenda_id']);
        $medico = $agenda->medico;
        foreach($medico->agenda->horarios as $item){
            if($item->dia_semana == $dia_semana){          

                $hora_inicial = date_parse($item->horario_inicio);
                $hora_final = date_parse($item->horario_fim);

                $turno = range($hora_inicial['hour'], $hora_final['hour']);
                foreach($turno as $horas)
                $horarios_medico_dia[] = $horas;
            }
        }
        sort($horarios_medico_dia);   
        $minutos = ['15', '30', '45'];
        return view('paciente/agendamentos/agendar', ['dia_semana' => $dia_semana, 'medico' => $medico,
                    'minutos' => $minutos, 'horarios_medico_dia' => $horarios_medico_dia])
                    ->withErrors($exception->getValidator());
        }
    }

    public function destroy($id){
        Agendamentos::destroy($id);
        return redirect('paciente/agendamentos');
    }

    public function show(){
        return view('paciente/agendamentos/mostraragendamentos');
    }
}
