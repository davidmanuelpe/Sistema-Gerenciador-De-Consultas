@extends('layouts.app')

<html>
    <head>
        <style>
        .label {
        color: white;
        padding: 8px;
        font-family: Arial;
        }   
        .botao{
        background-color: #e7e7e7;
        color: black;
        padding: 8px 8px;
        }
        </style>
    </head>
</html>    

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as Paciente!') }}
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        CPF: 
                        {{(Auth::user()->cpf)}}
                    </div>
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Nome: 
                        {{(Auth::user()->name)}}
                    </div>
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Sobrenome: 
                        {{(Auth::user()->sobrenome)}}
                    </div>
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Endereco: 
                        {{(Auth::user()->endereco)}}
                    </div>
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Email: 
                        {{(Auth::user()->email)}}
                    </div>
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Data de Nascimento: 
                        {{(Auth::user()->data_nascimento)}}
                    </div>
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Tipo: Paciente
                    </div>
                    <br>
                        <a class="label botao" href="{{ url('paciente/edit') }}">Editar</a>
                        <a class="label botao" href="{{ url('paciente/delete') }}">Deletar Perfil</a>
                        <a class="label botao" href="{{ url('/paciente/medicos') }}">Fazer Agendamento</a>  
                        <a class="label botao" href="{{ url('/paciente/agendamentos') }}">Agendamentos</a>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection