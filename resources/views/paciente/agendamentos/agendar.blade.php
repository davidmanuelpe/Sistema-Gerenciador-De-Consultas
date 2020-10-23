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
                <div class="card-header">{{ __('Agendar') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('agendar') }}">
                        @csrf


                        <div class="form-group row" id="nome_medicos" style="display: none">
                            <label for="agenda_id" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Médico') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('agenda_id') ? ' is-invalid' : '' }}" id="agenda_id" name='agenda_id'>
                            <option value="{{$medico->agenda->id}}" selected>{{$medico->funcionario->pessoa->name . " " . $medico->funcionario->pessoa->sobrenome}}</option>
                        </select>
                        @if($errors->has('agenda_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('agenda_id')}}
                            </div>
                        @endif
                            </div>
                        </div>

                        <div class="form-group row" id="nome_medicos" style="display: none">
                            <label for="paciente_id" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Paciente') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('paciente_id') ? ' is-invalid' : '' }}" id="paciente_id" name='paciente_id'>
                            <option value="{{Auth::user()->pessoaable->id}}" selected>{{Auth::user()->name . " " . Auth::user()->sobrenome}}</option>
                        </select>
                        @if($errors->has('paciente_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('paciente_id')}}
                            </div>
                        @endif
                            </div>
                        </div>
                       
                        
                        <div class="form-group row" id="Dias" style="display:none" hidden>
                            <label for="dia_semana" class="col-md-4 col-form-label text-md-right">{{ __('Dias em que o médico trabalha') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('dia_semana') ? ' is-invalid' : '' }}" id="dia_semana" name='dia_semana'>
                            <option value="{{$dia_semana}}"selected>{{$dia_semana}}</option>
                        </select>
                        @if($errors->has('dia_semana'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dia_semana')}}
                            </div>
                        @endif
                            </div>
                        </div>

                        <div class="form-group row" id="inicio">
                            <label for="inicio" class="col-md-7 col-form-label text-right">{{ __('Horário de agendamento') }}</label>
                        </div>

                        <div class="form-group row" id="horas_inicio">
                            <label for="hora_inicio" class="col-md-2 col-form-label text-md-right">{{ __('Hora') }}</label>
                            <div class="col-md-3">
                        <select class="custom-select{{ $errors->has('horario') ? ' is-invalid' : '' }}" id="hora" name='hora'>
                            <option value="">Hora</option>
                        @foreach ($horarios_medico_dia as $item)
                            @if($item < 10)
                            <option value="0{{$item}}">0{{$item}} Horas</option>
                            @else
                            <option value="{{$item}}">{{$item}} Horas</option>
                            @endif
                        @endforeach
                        </select>
                        @if($errors->has('horario'))
                            <div class="invalid-feedback">
                                {{ $errors->first('horario')}}
                            </div>
                        @endif
                            </div>

                            <label for="minuto_inicio" class="col-right-2 col-form-label text-md-right">{{ __('Minuto') }}</label>
                            <div class="col-md-3">
                        <select class="custom-select{{ $errors->has('horario') ? ' is-invalid' : '' }}" id="minuto" name='minuto'>
                            <option value="">Minuto</option>
                        <option value="{{0 . 0}}">00 Minuto</option>
                        @foreach ($minutos as $item)
                            <option value="{{$item}}">{{$item}} Minutos</option>
                        @endforeach
                        </select>
                        @if($errors->has('horario'))
                            <div class="invalid-feedback">
                                {{ $errors->first('horario')}}
                            </div>
                        @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Agendar') }}
                            </button>
                        </div>
                        <div class="column">
                            <a class="btn btn-primary" href="{{ url('recepcionista') }}">Voltar</a>  
                        </div>
                        </div>        
                        </div>


                        </form>
                        </div>
                        </div>
                        </div>
                        </div>    

                        @endsection
