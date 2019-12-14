@extends('layouts.login')

@section('title', app_name() . ' | ' . __('Iniciar Sesión'))

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile" style="background-image: url(media/bg/bg-3.jpg);">
                <div class="kt-login__left">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__content">
                            <a class="kt-login__logo" href="#">
                                <img src="media/logos/contasoft-black.svg">
                            </a>

                            <hr >

                            <p class="text-justify" style="font-size: 1.1rem; line-height: 26px;">
                                Para llevar una contabilidad administrada es importante seleccionar al profesional contable adecuado,
                                que tenga visión estratégica del futuro y sea ordenado, pero también es necesario poner a su disposición
                                toda la documentación pertinente, así como las herramientas tecnológicas que faciliten su trabajo y garanticen
                                la precisión de los registros.
                            </p>

                            @if(config('access.registration'))
                                <div class="kt-login__actions">
                                    <a href="{{ route('frontend.auth.register') }}" class="btn btn-outline-brand btn-pill">
                                        {{ __('Regístrate') }}
                                    </a>
                                </div>
                            @endif

                            <div class="row d-flex justify-content-center">
                                <div class="">
                                    <a href="javascript:" class="kt-link">
                                        {{ __('Términos de Uso') }}
                                    </a>
                                    &nbsp; | &nbsp;
                                    <a href="javascript:" class="kt-link">
                                        {{ __('Política de Privacidad') }}
                                    </a>
                                    &nbsp; | &nbsp;
                                    <a href="{{ route('frontend.contact') }}" class="kt-link">
                                        {{ __('Contactenos') }}
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-login__divider">
                    <div></div>
                </div>


                <div class="kt-login__right">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">
                                    {{ __('Inicia sesión para continuar') }}
                                </h3>
                            </div>

                            <div class="kt-login__form">
                                {{ html()->form('POST', route('frontend.auth.login.post'))->class('kt-form')->open() }}
                                <input class="form-control form-control-lg" style="background:none;" type="text" name="data" id="data" placeholder="{{ __('Usuario o Dirección de Correo') }}" maxlength="191" autofocus>
                                <input class="form-control form-control-lg form-control-last" style="background:none;" type="password" name="password" id="password" placeholder="{{ __('Contraseña') }}">

                                <div class="row kt-login__extra">
                                    <div class="col-3 kt-align-left">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="remember">
                                            {{ __('Recordarme') }}
                                            <span></span>
                                        </label>
                                    </div>

                                    <div class="col-9 kt-align-right">
                                        <a href="{{ route('frontend.auth.password.email') }}" class="kt-link">
                                            {{ __('¿Has olvidado tu contraseña?') }}
                                        </a>
                                    </div>
                                </div>

                                @if(config('access.captcha.login'))
                                    <div class="row">
                                        <div class="col">
                                            @captcha
                                            {{ html()->hidden('captcha_status', 'true') }}
                                        </div><!--col-->
                                    </div><!--row-->
                                @endif

                                <div class="kt-login__actions">
                                    <button class="btn btn-brand btn-pill btn-elevate">
                                        {{ __('Acceder') }}
                                    </button>
                                </div>
                            </div>
                            {{ html()->form()->close() }}
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="kt-login__head mb-4">
                                    <h3 class="kt-login__title">
                                        {{ __('O iniciar sesión con') }}:
                                    </h3>
                                </div>

                                <div class="btn-group btn-group-lg">
                                    @include('includes.partials.socialite')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
