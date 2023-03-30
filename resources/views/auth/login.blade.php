@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('SISTEMA DE HORARIO')])

@section('content')
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
            <h3>{{ __('SISTEMA DE HORARIO') }}</h3>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="card card-login card-hidden mb-3">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title"><strong>{{ __('BIENVENIDO') }}</strong></h4>
                        <div class="social-line">
                            <a href="#" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-description text-center">{{ __('Ingrese sus credenciales') }}</p>
                        <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">face</i>
                                    </span>
                                </div>
                                <input type="text" name="email" class="form-control" placeholder="{{ __('Ingrese correo') }}"
                                    value="{{ old('email', null) }}" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="{{ __('Ingrese contraseña') }}" required autocomplete="current-password">
                            </div>
                            @if ($errors->has('password'))
                            <div id="password-error" class="error text-danger pl-3" for="password"
                                style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="form-check mr-auto ml-3 mt-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}> {{ __('Recordar contraseña') }}
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="card-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Ingresar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
