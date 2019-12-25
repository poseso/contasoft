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
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr class="text-white">
                                                <th class="w-30">{{ html()->label(mb_strtoupper(__('Fecha'))) }}</th>
                                                <td>{{ $log->created_at }}</td>
                                            </tr>

                                            <tr class="text-white">
                                                <th>{{ html()->label(mb_strtoupper(__('Modelo'))) }}</th>
                                                <td>{{ $log->recordable_type }}</td>
                                            </tr>

                                            <tr class="text-white">
                                                <th>{{ html()->label(mb_strtoupper(__('ID de Fila'))) }}</th>
                                                <td>{{ $log->recordable_id }}</td>
                                            </tr>

                                            <tr class="text-white">
                                                <th>{{ html()->label(mb_strtoupper(__('Tipo'))) }}</th>
                                                <td>{{ mb_strtoupper($log->event) }}</td>
                                            </tr>

                                            <tr class="text-white">
                                                <th>{{ html()->label(mb_strtoupper(__('Usuario IP'))) }}</th>
                                                <td>{{ $log->ip_address }}</td>
                                            </tr>

                                            <tr class="text-white">
                                                <th>{{ html()->label(mb_strtoupper(__('Usuario'))) }}</th>
                                                <td>{{ $log->user->name ?? __('No disponible') }}</td>
                                            </tr>

                                            <tr class="text-white">
                                                <th>{{ html()->label(mb_strtoupper(__('Usuario Afectado'))) }}</th>
                                                <td>{{ $log->recordableUser->fullname }}</td>
                                            </tr>

                                            <tr class="text-white">
                                                <th>{{ html()->label(mb_strtoupper(__('URL'))) }}</th>
                                                <td>{{ $log->url }}</td>
                                            </tr>

                                            <tr class="text-white">
                                                <th>{{ html()->label(mb_strtoupper(__('Usuario Agente'))) }}</th>
                                                <td>{{ $log->user_agent }}</td>
                                            </tr>
                                        </table>
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
                                Request Payload
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="kt-portlet kt-portlet--skin-solid kt-bg-primary">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="flaticon-layers"></i>
                                    </span>

                                    <h3 class="kt-portlet__head-title">
                                        {{ __('Estado actual del objeto') }}
                                    </h3>
                                </div>
                            </div>

                            <div class="kt-portlet__body">
                                Datos
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
                                        {{ __('Estado del objeto en este registro') }}
                                    </h3>
                                </div>
                            </div>

                            <div class="kt-portlet__body">
                                Datos
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
