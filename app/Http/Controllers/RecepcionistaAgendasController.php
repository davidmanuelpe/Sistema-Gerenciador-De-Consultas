<?php

namespace App\Http\Controllers;

use App\Models\Medico;
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
}
