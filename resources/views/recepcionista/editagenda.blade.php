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
                <div class="card-header">{{ __('Editar Agenda') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('editaragenda') }}">
                        @csrf

                        <div class="form-group row" id="Dias" style="display: none">
                            <label for="dia_semana" class="col-md-4 col-form-label text-md-right">{{ __('Id_Horario') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('dia_semana') ? ' is-invalid' : '' }}" id="id" name='id' required autocomplete="id">
                            <option value="{{$horario->id }}">{{$horario->id }}</option>
                        </select>
                        </div>
                        </div>
                    
                        <div class="form-group row" id="Dias">
                            <label for="dia_semana" class="col-md-4 col-form-label text-md-right">{{ __('Dia da semana') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('dia_semana') ? ' is-invalid' : '' }}" id="dia_semana" name='dia_semana' required autocomplete="dia_semana">
                            <option value="{{$horario->dia_semana }}">{{$horario->dia_semana }}</option>
                        @foreach ($dias as $item)
                            <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                        </select>
                        @if($errors->has('dia_semana'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dia_semana')}}
                            </div>
                        @endif
                            </div>
                        </div>

                        <div class="form-group row" id="inicio">
                            <label for="inicio" class="col-md-7 col-form-label text-right">{{ __('Horário de inicio do turno') }}</label>
                        </div>

                        <div class="form-group row" id="horas_inicio">
                            <label for="hora_inicio" class="col-md-2 col-form-label text-md-right">{{ __('Hora') }}</label>
                            <div class="col-md-3">
                        <select class="custom-select{{ $errors->has('hora_inicio') ? ' is-invalid' : '' }}" id="hora_inicio" name='hora_inicio'>
                            @if((Int)($hora_inicio) < 2) 
                                <option value="{{$hora_inicio}}">{{$hora_inicio}} Hora</option>
                            @else
                                <option value="{{$hora_inicio}}">{{$hora_inicio}} Horas</option>
                            @endif
                            <option value="{{0 . 0}}">00 Hora</option>
                            <option value="{{0 . 1}}">01 Hora</option>
                        @foreach (range(2, 23) as $item)
                            @if((Int)($item) < 10) 
                            <option value="{{0 . $item}}">{{'0' . $item}} Horas</option>
                            @else
                            <option value="{{$item}}">{{$item}} Horas</option>
                            @endif
                        @endforeach
                        </select>
                        @if($errors->has('hora_inicio'))
                            <div class="invalid-feedback">
                                {{ $errors->first('hora_inicio')}}
                            </div>
                        @endif
                            </div>

                            <label for="minuto_inicio" class="col-right-2 col-form-label text-md-right">{{ __('Minuto') }}</label>
                            <div class="col-md-3">
                        <select class="custom-select{{ $errors->has('minuto_inicio') ? ' is-invalid' : '' }}" id="minuto_inicio" name='minuto_inicio'>
                            @if((Int)($minuto_inicio) < 2) 
                                <option value="{{$minuto_inicio}}">{{$minuto_inicio}} Minuto</option>
                            @else
                                <option value="{{$minuto_inicio}}">{{$minuto_inicio}} Minutos</option>
                            @endif
                        <option value="{{0 . 0}}">00 Minuto</option>
                        <option value="{{0 . 1}}">01 Minuto</option>
                        @foreach (range(2, 59) as $item)
                            @if((Int)($item) < 10) 
                            <option value="{{0 . $item}}">{{'0' . $item}} Minutos</option>
                            @else
                            <option value="{{$item}}">{{$item}} Minutos</option>
                            @endif
                        @endforeach
                        </select>
                        @if($errors->has('minuto_inicio'))
                            <div class="invalid-feedback">
                                {{ $errors->first('minuto_inicio')}}
                            </div>
                        @endif
                            </div>
                        </div>


                        <div class="form-group row" id="final">
                            <label for="final" class="col-md-7 col-form-label text-right">{{ __('Horário de final do turno') }}</label>
                        </div>

                        <div class="form-group row" id="hora_final">
                            <label for="hora_final" class="col-md-2 col-form-label text-md-right">{{ __('Hora') }}</label>
                            <div class="col-md-3">
                        <select class="custom-select{{ $errors->has('hora_final') ? ' is-invalid' : '' }}" id="hora_final" name='hora_final'>
                            @if((Int)($hora_final) < 2) 
                                <option value="{{$hora_final}}">{{$hora_final}} Hora</option>
                            @else
                                <option value="{{$hora_final}}">{{$hora_final}} Horas</option>
                            @endif
                            <option value="{{0 . 0}}">00 Hora</option>
                            <option value="{{0 . 1}}">01 Hora</option>
                        @foreach (range(2, 23) as $item)
                            @if((Int)($item) < 10) 
                            <option value="{{0 . $item}}">{{'0' . $item}} Horas</option>
                            @else
                            <option value="{{$item}}">{{$item}} Horas</option>
                            @endif
                        @endforeach
                        </select>
                        @if($errors->has('hora_final'))
                            <div class="invalid-feedback">
                                {{ $errors->first('hora_final')}}
                            </div>
                        @endif
                            </div>

                            <label for="minuto_final" class="col-right-2 col-form-label text-md-right">{{ __('Minuto') }}</label>
                            <div class="col-md-3">
                        <select class="custom-select{{ $errors->has('minuto_final') ? ' is-invalid' : '' }}" id="minuto_final" name='minuto_final'>
                            @if((Int)($minuto_final) < 2) 
                                <option value="{{$minuto_final}}">{{$minuto_final}} Minuto</option>
                            @else
                                <option value="{{$minuto_final}}">{{$minuto_final}} Minutos</option>
                            @endif
                            <option value="{{0 . 0}}">00 Minuto</option>
                            <option value="{{0 . 1}}">01 Minuto</option>
                        @foreach (range(2, 59) as $item)
                            @if((Int)($item) < 10) 
                            <option value="{{0 . $item}}">{{'0' . $item}} Minutos</option>
                            @else
                            <option value="{{$item}}">{{$item}} Minutos</option>
                            @endif
                        @endforeach
                        </select>
                        @if($errors->has('minuto_final'))
                            <div class="invalid-feedback">
                                {{ $errors->first('minuto_final')}}
                            </div>
                        @endif
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Editar Horário') }}
                            </button>
                        </div>
                        <div class="column">
                            <a class="btn btn-primary" href="{{ url('recepcionista/agendas') }}">Voltar</a>  
                        </div>
                    </div>        
                    </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>    

@endsection
