<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(Request $request, $pessoa){

        if($pessoa->pessoaable->tipo == 'funcionario'){
            if($pessoa->pessoaable->funcionarioable->tipo == "administrador"){
                return redirect('admin');
            }
            elseif($pessoa->pessoaable->funcionarioable->tipo == "medico"){
                return redirect('medico');
            }
            elseif($pessoa->pessoaable->funcionarioable->tipo == "recepcionista"){
                return redirect('recepcionista');
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
        $this->middleware('guest')->except('logout');
    }

}
