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
                        <select class="custom-select{{ $errors->has('id') ? ' is-invalid' : '' }}" id="id" name='id' value="{{ old('id') ? old('id') : $horario->id  }}" required autocomplete="id">
                            <option value="{{$horario->id }}">{{$horario->id }}</option>
                        </select>
                        </div>
                        </div>

                        <div class="form-group row" id="Dias" style="display: none">
                            <label for="dia_semana" class="col-md-4 col-form-label text-md-right">{{ __('Id_Horario') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('agenda_id') ? ' is-invalid' : '' }}" id="agenda_id" name='agenda_id' value="{{ old('agenda_id') ? old('agenda_id') : $horario->agenda->id  }}" required autocomplete="agenda_id">
                            <option value="{{$horario->agenda->id}}">{{$horario->agenda->id}}</option>
                        </select>
                        </div>
                        </div>
                    
                        <div class="form-group row" id="Dias">
                            <label for="dia_semana" class="col-md-4 col-form-label text-md-right">{{ __('Dia da semana') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('dia_semana') ? ' is-invalid' : '' }}" id="dia_semana" name='dia_semana' required autocomplete="dia_semana">
                            <option value="{{ old('dia_semana') ? old('dia_semana') : $horario->dia_semana }}"selected>{{$horario->dia_semana }}</option>
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
                        <select class="custom-select{{ $errors->has('horario_inicio') ? ' is-invalid' : '' }}" id="hora_inicio" name='hora_inicio'>
                            @if((Int)($hora_inicio) < 2) 
                                <option value="{{ old('hora_inicio') ? old('hora_inicio') : $hora_inicio}}"selected>{{$hora_inicio}} Hora</option>
                            @else
                                <option value="{{ old('hora_inicio') ? old('hora_inicio') : $hora_inicio}}"selected>{{$hora_inicio}} Horas</option>
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
                        @if($errors->has('horario_inicio'))
                            <div class="invalid-feedback">
                                {{ $errors->first('horario_inicio')}}
                            </div>
                        @endif
                            </div>

                            <label for="minuto_inicio" class="col-right-2 col-form-label text-md-right">{{ __('Minuto') }}</label>
                            <div class="col-md-3">
                        <select class="custom-select{{ $errors->has('horario_inicio') ? ' is-invalid' : '' }}" id="minuto_inicio" name='minuto_inicio'>
                            @if((Int)($minuto_inicio) < 2) 
                                <option value="{{ old('minuto_inicio') ? old('minuto_inicio') : $minuto_inicio}}"selected>{{$minuto_inicio}} Minuto</option>
                            @else
                                <option value="{{ old('minuto_inicio') ? old('minuto_inicio') : $minuto_inicio}}"selected>{{$minuto_inicio}} Minutos</option>
                            @endif
                        <option value="{{0 . 0}}">00 Minuto</option>
                        @foreach ($minutos as $item)
                            <option value="{{$item}}">{{$item}} Minutos</option>
                        @endforeach
                        </select>
                        @if($errors->has('horario_inicio'))
                            <div class="invalid-feedback">
                                {{ $errors->first('horario_inicio')}}
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
                        <select class="custom-select{{ $errors->has('horario_fim') ? ' is-invalid' : '' }}" id="hora_final" name='hora_final'>
                            @if((Int)($hora_final) < 2) 
                                <option value="{{ old('hora_final') ? old('hora_final') : $hora_final}}"selected>{{$hora_final}} Hora</option>
                            @else
                                <option value="{{ old('hora_final') ? old('hora_final') : $hora_final}}"selected>{{$hora_final}} Horas</option>
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
                        @if($errors->has('horario_fim'))
                            <div class="invalid-feedback">
                                {{ $errors->first('horario_fim')}}
                            </div>
                        @endif
                            </div>

                            <label for="minuto_final" class="col-right-2 col-form-label text-md-right">{{ __('Minuto') }}</label>
                            <div class="col-md-3">
                        <select class="custom-select{{ $errors->has('horario_fim') ? ' is-invalid' : '' }}" id="minuto_final" name='minuto_final'>
                            @if((Int)($minuto_final) < 2) 
                                <option value="{{ old('minuto_final') ? old('minuto_final') : $minuto_final}}"selected>{{$minuto_final}} Minuto</option>
                            @else
                                <option value="{{ old('minuto_final') ? old('minuto_final') : $minuto_final}}"selected>{{$minuto_final}} Minutos</option>
                            @endif
                            <option value="{{0 . 0}}">00 Minuto</option>
                        @foreach ($minutos as $item)
                            <option value="{{$item}}">{{$item}} Minutos</option>
                        @endforeach
                        </select>
                        @if($errors->has('horario_fim'))
                            <div class="invalid-feedback">
                                {{ $errors->first('horario_fim')}}
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
