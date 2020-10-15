@extends('layouts.app')

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
      box-sizing: border-box;
    }
    
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    /* Float four columns side by side */
    .column {
      float: left;
      width: 25%;
      padding: 0 10px;
    }
    
    /* Remove extra left and right margins, due to padding */
    .row {margin: 0 -5px;}
    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    
    /* Responsive columns */
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }
    
    /* Style the counter cards */
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 16px;
      text-align: center;
      background-color: #f1f1f1;
    }
    </style>
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agenda de {{ __($medico->funcionario->pessoa->name . ' ' . $medico->funcionario->pessoa->sobrenome) }}</div>

                <div class="card-body">
                    <div class="row">
                        
                        @foreach($medico->agenda->horarios as $item)
                        <div class="column">
                            <div class="card">
                                {{$item->dia_semana}}
                                <br>
                                {{$item->horario_inicio}}
                                <br>
                                {{$item->horario_fim}}
                                <br>
                                <a class="label botao" href="{{ url('recepcionista/agendas/editar-horario/'.$item->id) }}">Editar</a>
                                <br>
                                <a class="label botao" href="{{ url('recepcionista/agendas/remover-horario/'.$item->id) }}">Deletar</a></div>
                            </div>
                        @endforeach
                        
                    </div>    
                </div>
                @csrf
                <a class="label botao" href="{{ url('recepcionista/agendas') }}">Voltar</a>
            </div>        
        </div>                        
    </div>
</div>
@endsection
