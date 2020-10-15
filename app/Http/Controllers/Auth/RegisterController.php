<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use App\Providers\RouteServiceProvider;
use User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as somethingelse;
use App\Validator\PessoaValidator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function authenticated(Request $request, $pessoa){

        if($pessoa->pessoaable->tipo == 'funcionario'){
            if($pessoa->pessoaable->funcionarioable->tipo == 'administrador'){
                return redirect('admin');
            }
        }
        else{
            return redirect('paciente');
        }
        


    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return somethingelse::make($data, [
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Pessoa
     */
    protected function create(array $data)
    {

        
        $polimorph = \App\Models\Paciente::create();

        return $polimorph->pessoa()->create([
            'cpf' => $data['cpf'],
            'name' => $data['name'],
            'sobrenome' => $data['sobrenome'],
            'data_nascimento' => $data['data_nascimento'],
            'endereco' => $data['endereco'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        
    
    }

    

}

