@extends('layouts.app')

<html>
    <head>
        <script>

        </script>
    </head>
</html>    

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agenda de {{ __(Auth::user()->name . ' ' . Auth::user()->sobrenome) }}</div>

                <div class="card-body">
                            {{$horario->dia_semana}}
                            <br>
                            {{$horario->horario_inicio}}
                            <br>
                            {{$horario->horario_fim}}
                            <br>
                            <a class="label botao" href="{{ url('medico/agenda') }}">Voltar</a>

                </div>
                @csrf
            </div>        
        </div>                        
    </div>
</div>
@endsection