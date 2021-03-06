@extends('layouts.login')

@section('title', app_name() . ' | ' . __('Su contraseña ha expirado'))

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('media/bg/bg-3.jpg') }}); background-size: cover;">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="messages"></div>
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img src="{{ asset('media/logos/contasoft-black.svg') }}" alt="Logo Contasoft">
                            </a>
                        </div>

                        {{ html()->form('PATCH', route('frontend.auth.password.expired.update'))->class('kt-form')->open() }}
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">
                                {{ __('Su contraseña ha expirado') }}
                            </h3>
                            <div class="kt-login__desc">
                                {{ __('Escriba su contraseña antigua seguido de la nueva contraseña para confirmar los cambios.') }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->password('old_password')
                                        ->class('form-control form-control-lg')
                                        ->placeholder(__('Contraseña antigua')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->password('password')
                                        ->class('form-control form-control-lg')
                                        ->placeholder(__('Contraseña')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->password('password_confirmation')
                                        ->class('form-control form-control-lg')
                                        ->placeholder(__('Confirmación de la contraseña')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                {{ form_cancel(route('frontend.auth.login'), __('Cancelar')) }}
                            </div><!--col-->

                            <div class="col text-right">
                                {{ form_submit(__('Actualizar Contraseña')) }}
                            </div><!--col-->
                        </div><!--row-->
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
