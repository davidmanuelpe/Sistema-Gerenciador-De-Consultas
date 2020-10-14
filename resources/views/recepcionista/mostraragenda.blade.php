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
                <div class="card-header">Agenda de {{ __($medico->funcionario->pessoa->name . ' ' . $medico->funcionario->pessoa->sobrenome) }}</div>

                <div class="card-body">
                        @foreach($medico->agenda->horarios as $item)
                        <div class="card-body">
                            {{$item->dia_semana}}
                            <br>
                            {{$item->horario_inicio}}
                            <br>
                            {{$item->horario_fim}}
                            <br>
                            <a class="label botao" href="{{ url('recepcionista/agendas/editar-horario/'.$item->id) }}">Editar</a>
                        </div>
                        @endforeach
                </div>
                @csrf
            </div>        
        </div>                        
    </div>
</div>
@endsection
