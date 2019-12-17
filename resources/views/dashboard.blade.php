@extends('layouts.app')

@section('title', app_name() . ' | ' . __('Tablero de Control'))

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-app"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Tablero de Control') }} <small class="text-muted">{{ __('Inicio') }}</small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-group">
                    <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-outline-info btn-icon-md">
                        <i class="la la-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <p>{{ __('Bienvenido') }} {{ $logged_in_user->name }}!</p>
        </div>
    </div>
    <!--end::Portlet-->
@endsection
