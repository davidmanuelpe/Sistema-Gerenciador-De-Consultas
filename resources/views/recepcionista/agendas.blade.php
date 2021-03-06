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
                <div class="card-header">{{ __('Agendas') }}</div>
                <div class="card-body">
                <form method="post" action="{{ url('/recepcionista/agendas/medico') }}">
                    @csrf
                    <div class="form-group row" id="nome_medicos">
                        
                        <label for="agenda_id" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Médico') }}</label>
                        <div class="col-md-6">
                    <select class="custom-select{{ $errors->has('id') ? ' is-invalid' : '' }}" id="medico_id" name='medico_id'>
                        <option value="">Selecione o Médico</option>
                    @foreach ($medicos as $item)
                        <option value="{{$item->id}}">{{$item->funcionario->pessoa->name . " " . $item->funcionario->pessoa->sobrenome}}</option>
                    @endforeach
                    </select>
                    @if($errors->has('id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('id')}}
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
                            <a class="btn btn-primary" href="{{ url('recepcionista') }}">Voltar</a>  
                            </div>
                        </div>
                        
                </form>
                     
                </div>
                  
                </div>
            </div>        
        </div>                        
    </div>
</div>
@endsection
