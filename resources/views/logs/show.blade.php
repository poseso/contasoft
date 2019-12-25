@extends('layouts.app')

@section('title', app_name() . ' | ' . __('Administración de Eventos') . ' | ' . __('Visualizando Evento'))

@section('breadcrumb-links')
    @include('logs.includes.header-buttons')
@endsection

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    <i class="flaticon-globe"></i>
                    &nbsp; {{ __('Visualizando Evento') }}
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-group">
                    <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md">
                        <i class="la la-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <div class="kt-portlet__content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="kt-portlet kt-portlet--skin-solid kt-bg-primary">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="flaticon-layers"></i>
                                    </span>

                                    <h3 class="kt-portlet__head-title">
                                        {{ __('Detalles Acción') }}
                                    </h3>
                                </div>
                            </div>

                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    {{ html()->label(__('Fecha'))->class('col-xl-3 col-lg-3') }}

                                    <div class="col-lg-9 col-xl-6">
                                        {{ $log->created_at }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {{ html()->label(__('Modelo'))->class('col-xl-3 col-lg-3') }}

                                    <div class="col-lg-9 col-xl-6">
                                        {{ $log->recordable_type }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="kt-portlet kt-portlet--skin-solid kt-bg-primary">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="flaticon-layers"></i>
                                    </span>

                                    <h3 class="kt-portlet__head-title">
                                        {{ __('Request Payload') }}
                                    </h3>
                                </div>
                            </div>

                            <div class="kt-portlet__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting  dummy text of the printing  dummy text of the printing dummy text of the printing industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.user.logs.index'), __('Cancelar')) }}
                </div><!--col-->

                <div class="col text-right">
                    <a href="#" class="btn btn-info btnSubmit @cannot('logs.update') disabled @endcannot">
                        <i class="fa fa-clipboard"></i>
                        {{ __('Restaurar a este Estado') }}
                    </a>
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    <!--end::Portlet-->
@endsection
