<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Hash;

class EditMedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('medico');
    }


    public function index(){
        return view('medico/medicowelcome');
    }
    public function edit(){
        return view('medico/editMedico');
    }

    protected function update(Request $request){

        $pessoa = Pessoa::find(Auth::user()->id);
        $funcionario = $pessoa->pessoaable; 
        $funcionario->carga_horaria = $request['carga_horaria'];
        $funcionario->save();
            
        $pessoa->cpf = $request['cpf'];
        $pessoa->name = $request['name'];
        $pessoa->sobrenome = $request['sobrenome'];
        $pessoa->data_nascimento = $request['data_nascimento'];
        $pessoa->endereco = $request['endereco'];
        $pessoa->email = $request['email'];
        $pessoa->password = Hash::make($request['password']);
    
        $pessoa->save();
    
        return redirect('medico');
    }

    protected function destroy(){
        Pessoa::destroy(Auth::user()->id);
        return redirect('/');
    }
}
