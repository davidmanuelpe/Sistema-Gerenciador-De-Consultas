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
                    <form method="post" action="{{ url('paciente/medicos/dias') }}">
                        @csrf


                        <div class="form-group row" id="nome_medicos" style="display: none">
                            <label for="medico_id" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Médico') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('medico_id') ? ' is-invalid' : '' }}" id="medico_id" name='medico_id'>
                            <option value="{{$medico->id}}" selected>{{$medico->funcionario->pessoa->name . " " . $medico->funcionario->pessoa->sobrenome}}</option>
                        </select>
                        @if($errors->has('medico_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('medico_id')}}
                            </div>
                        @endif
                            </div>
                        </div>

                        <div class="form-group row" id="Dias">
                            <label for="dia_semana" class="col-md-4 col-form-label text-md-right">{{ __('Dias em que o médico trabalha') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('dia_semana') ? ' is-invalid' : '' }}" id="dia_semana" name='dia_semana'>
                            <option value="">Selecione o dia da semana</option>
                        @foreach ($dias_unicos as $item)
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
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-4">
                                <div class="column">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Exibir') }}
                                </button>
                            </div>
                            </div>
                            <div class="column">
                            <a class="btn btn-primary" href="{{ url('paciente/medicos') }}">Voltar</a>
                            
                            </div>
                        </div>
                    </form>
                     
                </div>
                  
                </div>
            </div>        
        </div>                        
    </div>
@endsection