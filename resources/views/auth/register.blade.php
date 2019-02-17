@extends('layouts.base')
@section('content')

<!--==========================
    Intro Section
  ============================-->
<section id="intro">
<div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/5.jpg')}}" alt=""></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dbd-auth" style="margin-top: -80%; color: white; background-color: #212529c7;">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_usuario" type="text" class="form-control{{ $errors->has('apellido_usuario') ? ' is-invalid' : '' }}" name="apellido_usuario" value="{{ old('apellido_usuario') }}" required autofocus>

                                @if ($errors->has('apellido_usuario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_documento_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Número documento') }}</label>

                            <div class="col-md-6">
                                <input id="num_documento_usuario" type="text" class="form-control{{ $errors->has('num_documento_usuario') ? ' is-invalid' : '' }}" name="num_documento_usuario" value="{{ old('num_documento_usuario') }}" required autofocus>

                                @if ($errors->has('num_documento_usuario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('num_documento_usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required autofocus>

                                @if ($errors->has('fecha_nacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pais_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

                            <div class="col-md-6">
                                <input id="pais_usuario" type="text" class="form-control{{ $errors->has('pais_usuario') ? ' is-invalid' : '' }}" name="pais_usuario" value="{{ old('pais_usuario') }}" required autofocus>

                                @if ($errors->has('pais_usuario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pais_usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-get-started scrollto">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
</div>

@endsection
