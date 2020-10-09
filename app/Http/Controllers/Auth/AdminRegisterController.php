<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Auth;
use Redirect , Response;

class AdminRegisterController extends Controller
{


    use RegistersUsers;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cpf' => 'required|cpf|unique:pessoas',
            'name' => 'required|min:3|max:50',
            'sobrenome' => 'required|min:3|max:50',
            'data_nascimento' => 'required|data', 
            'endereco' => 'required|min:10|max:100',
            'email' => 'required|email|unique:pessoas',
            'password' => 'required|min:8|confirmed',
            'pessoaable_type' => 'required',
        ]);
    }


    public function edit(){
        return view('admin/editAdmin');
    }


    public function create(){
        return view('admin/cadastroAdmin');
    }

    public function show(){
        return view('admin/editAdmin');
    }

    public function index(){
        return view('admin/adminwelcome');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return Pessoa
     */
    protected function store(Request $request){

        if ($request['pessoaable_type'] == "funcionario"){
            if ($request['funcionarioable_type'] == 'medico'){
                $medico = \App\Models\Medico::create(['tipo' => 'medico']);
                $polimorph = $medico->funcionario()->create(['carga_horaria' => $request['carga_horaria'], 'tipo' => 'funcionario' ]);
                
            }
            elseif ($request['funcionarioable_type'] == 'recepcionista'){

                $recepcionista = \App\Models\Recepcionista::create(['tipo' => 'recepcionista']);
                $polimorph = $recepcionista->funcionario()->create(['carga_horaria' => $request['carga_horaria'], 'tipo' => 'funcionario' ]);
            }
            elseif ($request['funcionarioable_type'] == 'administrador'){

                $administrador = \App\Models\Administrador::create(['tipo' => 'administrador']);
                $polimorph = $administrador->funcionario()->create(['carga_horaria' => $request['carga_horaria'], 'tipo' => 'funcionario' ]);
            }
            
        }
        elseif ($request['pessoaable_type'] == "paciente"){

            $polimorph = \App\Models\Paciente::create();
        }
        $polimorph->pessoa()->create([
            'cpf' => $request['cpf'],
            'name' => $request['name'],
            'sobrenome' => $request['sobrenome'],
            'data_nascimento' => $request['data_nascimento'],
            'endereco' => $request['endereco'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('admin');
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

    return redirect('admin');
}


}