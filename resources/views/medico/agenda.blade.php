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
                        @foreach(Auth::user()->pessoaable->funcionarioable->agenda->horarios as $item)
                        <div class="card-body">
                            {{$item->dia_semana}}
                            <br>
                            {{$item->horario_inicio}}
                            <br>
                            {{$item->horario_fim}}
                            <br>
                            <a class="label botao" href="{{ url('/medico/agenda/horario/'.$item->id) }}">Mostrar</a>
                        </div>
                        @endforeach
                </div>
                @csrf
            </div>        
        </div>                        
    </div>
</div>
@endsection
