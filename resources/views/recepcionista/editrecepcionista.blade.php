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
                <div class="card-header">{{ __('Editar o Perfil de'. ' ' . Auth::user()->name . ' ' . Auth::user()->sobrenome) }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('editarrecepcionista') }}">
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

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sobrenome" class="col-md-4 col-form-label text-md-right">{{ __('Sobrenome') }}</label>

                            <div class="col-md-6">
                                <input id="sobrenome" type="text" class="form-control @error('nome') is-invalid @enderror" name="sobrenome" value="{{ old('name') ? old('name') : Auth::user()->sobrenome }}" required autocomplete="sobrenome" autofocus>

                                @error('sobrenome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data_nascimento" class="col-md-4 col-form-label text-md-right">{{ __('Data de nascimento') }}</label>

                            <div class="col-md-6">
                                <input id="data_nascimento" type="text" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ old('name') ? old('name') : Auth::user()->data_nascimento }}" required autocomplete="data_nascimento" autofocus>

                                @error('data_nascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ old('name') ? old('name') : Auth::user()->endereco }}" required autocomplete="endereco">

                                @error('endereco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('name') ? old('name') : Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                            <div class="form-group row" id="horas">
                                <label for="carga_horaria" class="col-md-4 col-form-label text-md-right">{{ __('Carga Horária') }}</label>
                                <div class="col-md-6">
                                <select class="custom-select{{ $errors->has('carga_horaria') ? ' is-invalid' : '' }}" id="carga_horaria" name='carga_horaria'>
                                <option value="{{Auth::user()->pessoaable->carga_horaria }}" selected>{{Auth::user()->pessoaable->carga_horaria }}</option>
                                <option value="1 hora">1 hora</option>
                                <option value="2 horas">2 horas</option>
                                <option value="3 horas">3 horas</option>
                                <option value="4 horas">4 horas</option>
                                <option value="5 horas">5 horas</option>
                                <option value="6 horas">6 horas</option>
                                <option value="7 horas">7 horas</option>
                                <option value="8 horas">8 horas</option>
                                </select>
                                @if($errors->has('carga_horaria'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('carga_horaria')}}
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-4">
                                <div class="column">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                            </div>
                            <div class="column">
                                <a class="btn btn-primary" href="{{ url('recepcionista') }}">Voltar</a>
                            </div>
                        </div>
                        </div>
                            
                        </div>            
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>

@endsection
