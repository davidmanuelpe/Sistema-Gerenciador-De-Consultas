<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Horario;
use App\Models\Recepcionista;
use Illuminate\Http\Request;

class RecepcionistaAgendasController extends Controller
{

    public function __construct()
    {
        $this->middleware('recepcionista');
    }

    public function index(){
        $medicos = Medico::all();
        return view('recepcionista/agendas', ['medicos' => $medicos]);
    }

    public function show(Request $request){
        $medico = Medico::find($request['medico_id']);
        return view('recepcionista/mostraragenda', ['medico' => $medico]);
    }

    public function edit($id){
        $horario = Horario::find($id);
        $hora_inicio = $horario->horario_inicio[0] . $horario->horario_inicio[1];
        $minuto_inicio = $horario->horario_inicio[3] . $horario->horario_inicio[4];
        $hora_final = $horario->horario_fim[0] . $horario->horario_fim[1];
        $minuto_final = $horario->horario_fim[3] . $horario->horario_fim[4];
        $dias = collect(['Segunda-feira', 'Terça-feira', 'Quarta-feira',
                         'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo']);
        return view('recepcionista/editagenda', ['horario' => $horario, 'dias' => $dias, 'hora_inicio' => $hora_inicio,
                                                 'minuto_inicio' => $minuto_inicio, 'hora_final' => $hora_final, 'minuto_final' => $minuto_final]);

    }

    protected function update(Request $request){
        $inicio = $request['hora_inicio'] . ':' . $request['minuto_inicio'] . ':' . '00';
        $final = $request['hora_final'] . ':' . $request['minuto_final'] . ':' . '00';

        $horario = Horario::find($request['id']);
        $agenda_id = $horario->agenda->id;
        
        $horario->update([
            'horario_inicio' => $inicio,
            'horario_fim' => $final,
            'dia_semana' => $request['dia_semana'],
            'agenda_id' => $agenda_id
        ]);
        return redirect('recepcionista/mostraragenda');
    }

    protected function destroy($id){
        Horario::destroy($id);
        return redirect('/');
    }
}
