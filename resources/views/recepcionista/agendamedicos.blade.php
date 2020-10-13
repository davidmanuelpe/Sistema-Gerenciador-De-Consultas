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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('criaragenda') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') ? old('cpf') : Auth::user()->cpf}}" required autocomplete="cpf" autofocus>

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" id="nome_medicos">
                            <label for="agenda_id" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Médico') }}</label>
                            <div class="col-md-6">
                        <select class="custom-select{{ $errors->has('agenda_id') ? ' is-invalid' : '' }}" id="agenda_id" name='agenda_id'>
                            <option value="">Selecione o Médico</option>
                        @foreach ($medicos as $item)
                            <option value="{{$item->agenda->id}}">{{$item->funcionario->pessoa->name}}</option>
                        @endforeach
                        </select>
                        @if($errors->has('agenda_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('agenda_id')}}
                            </div>
                        @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Criar Agenda') }}
                            </button>
                        </div>
                    </div>        
                    </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>    

@endsection
