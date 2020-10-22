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
                <div class="card-header">{{ __('Registrar Horário') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('criaragenda') }}">
                        @csrf


                        <div class="form-group row" id="nome_medicos">
                            <label for="agenda_id" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Médico') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('agenda_id') ? ' is-invalid' : '' }}" id="agenda_id" name='agenda_id'>
                            <option value="">Selecione o Médico</option>
                        @foreach ($medicos as $item)
                            <option value="{{$item->agenda->id}}">{{$item->funcionario->pessoa->name . " " . $item->funcionario->pessoa->sobrenome}}</option>
                        @endforeach
                        </select>
                        @if($errors->has('agenda_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('agenda_id')}}
                            </div>
                        @endif
                            </div>
                        </div>

                        <div class="form-group row" id="Dias">
                            <label for="dia_semana" class="col-md-4 col-form-label text-md-right">{{ __('Dia da semana') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('dia_semana') ? ' is-invalid' : '' }}" id="dia_semana" name='dia_semana'>
                            <option value="">Selecione o dia da semana</option>
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
                            <option value="">Hora</option>
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
                            <option value="">Minuto</option>
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
                            <option value="">Hora</option>
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
                            <option value="">Minuto</option>
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
                                {{ __('Criar Horário') }}
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
