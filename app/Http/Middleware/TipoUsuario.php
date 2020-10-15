<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()){
            if(Auth::user()->pessoaable->tipo == "funcionario"){
                if(Auth::user()->pessoaable->funcionarioable->tipo == "administrador"){
                    return $next($request);
                }
                elseif(Auth::user()->pessoaable->funcionarioable->tipo == "recepcionista"){
                    return redirect('recepcionista');
                }
                elseif(Auth::user()->pessoaable->funcionarioable->tipo == "medico"){
                    return redirect('medico');
                }
                
            }
            else{
                return redirect('paciente');
            }

        }
        return redirect('login');
    }
}
