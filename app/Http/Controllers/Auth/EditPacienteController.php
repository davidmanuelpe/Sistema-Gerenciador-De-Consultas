<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Hash;

class EditPacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(){
        return view('paciente/editpaciente');
    }

    protected function update(Request $request){

        $pessoa = Pessoa::find(Auth::user()->id);
            
        $pessoa->cpf = $request['cpf'];
        $pessoa->name = $request['name'];
        $pessoa->sobrenome = $request['sobrenome'];
        $pessoa->data_nascimento = $request['data_nascimento'];
        $pessoa->endereco = $request['endereco'];
        $pessoa->email = $request['email'];
        $pessoa->password = Hash::make($request['password']);
    
        $pessoa->save();
    
        return redirect('paciente');
    }

    protected function destroy(){
        Pessoa::destroy(Auth::user()->id);
        return redirect('/');
    }

}
