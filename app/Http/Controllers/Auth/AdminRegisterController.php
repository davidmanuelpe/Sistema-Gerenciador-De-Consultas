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
use App\Validator\PessoaValidator;
use App\Validator\FuncionarioValidator;

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
        try{

            FuncionarioValidator::validate($request->all());
            
        if ($request['pessoaable_type'] == "funcionario"){
            if ($request['funcionarioable_type'] == 'medico'){
                $medico = \App\Models\Medico::create(['tipo' => 'medico']);
                \App\Models\Agenda::create(['medico_id' => $medico->id]);
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
        return redirect('admin')
        ->with("Usuário Cadastrado com Sucesso!");
        
        }

        catch(\App\Validator\ValidationException $exception){
            return redirect('admin/cadastroAdmin')
            ->withErrors($exception->getValidator())
            ->withInput();


        }
}

protected function update(Request $request){
    #try{
        #FuncionarioValidator::validate($request->all());

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

    return redirect('admin')
    ->with("Editado com Sucesso!");
    #}
    #catch(\App\Validator\ValidationException $exception){
      #  return redirect('admin/editAdmin')
      #  ->withErrors($exception->getValidator())
     #   ->withInput();


    #}
}


}
