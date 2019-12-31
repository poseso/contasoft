@extends('layouts.app')

@section('title', __('Administración de Usuarios') . ' | ' . __('Nuevo Usuario') . ' | ' . app_name())

@section('breadcrumb-links')
    @include('user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.user.store'))->class('form-horizontal')->open() }}
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-users-1"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Usuarios') }}
                    <small class="text-muted">{{ __('Nuevo Usuario') }}</small>
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

        <!--begin::Content-->
        <div class="kt-portlet__body">
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('Nombre'))->class('col-md-2 form-control-label align-self-center')->for('first_name') }}

                        <div class="col-md-10">
                            {{ html()->text('first_name')
                                ->class('form-control form-control-lg')
                                ->placeholder(__('Nombre'))
                                ->attribute('maxlength', 70)
                                ->autofocus() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Apellidos'))->class('col-md-2 form-control-label align-self-center')->for('last_name') }}

                        <div class="col-md-10">
                            {{ html()->text('last_name')
                                ->class('form-control form-control-lg')
                                ->placeholder(__('Apellidos'))
                                ->attribute('maxlength', 70) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Usuario'))->class('col-md-2 form-control-label align-self-center')->for('username') }}

                        <div class="col-md-10">
                            {{ html()->text('username')
                                ->class('form-control form-control-lg')
                                ->placeholder(__('Usuario'))
                                ->attribute('maxlength', 25) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Dirección de correo'))->class('col-md-2 form-control-label align-self-center')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control form-control-lg')
                                ->placeholder(__('Dirección de correo'))
                                ->attribute('maxlength', 65) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Contraseña'))->class('col-md-2 form-control-label align-self-center')->for('password') }}

                        <div class="col-md-10">
                            {{ html()->password('password')
                                ->class('form-control form-control-lg')
                                ->placeholder(__('Contraseña')) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Confirmación de la contraseña'))->class('col-md-2 form-control-label align-self-center')->for('password_confirmation') }}

                        <div class="col-md-10">
                            {{ html()->password('password_confirmation')
                                ->class('form-control form-control-lg')
                                ->placeholder(__('Confirmación de la contraseña')) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Activo'))->class('col-md-2 form-control-label align-self-center')->for('active') }}

                        <div class="col-md-10">
                            <span class="kt-switch kt-switch--sm kt-switch--icon">
                                <label>
                                    {{ html()->checkbox('active', true) }}
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Confirmado'))->class('col-md-2 form-control-label align-self-center')->for('confirmed') }}

                        <div class="col-md-10">
                            <span class="kt-switch kt-switch--sm kt-switch--icon">
                                <label>
                                    {{ html()->checkbox('confirmed', true) }}
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    @if(! config('access.users.requires_approval'))
                        <div class="form-group row">
                            {{ html()->label(__('Enviar Correo de Confirmación') . '<br/>' . '<small>' .  __('Si la confirmación está desactivada') . '</small>')
                                ->class('col-md-2')->for('confirmation_email') }}

                            <div class="col-md-10">
                                <span class="kt-switch kt-switch--sm kt-switch--icon">
                                    <label>
                                        {{ html()->checkbox('confirmation_email') }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-xl-6 col-sm-12">
                            <h3 class="kt-portlet__head-title">{{ __('Perfiles') }}</h3>
                            <div class="table-responsive">
                                <table class="table-permissions">
                                    <tbody>
                                    <tr>
                                        <td>
                                            @if($roles->count())
                                                @foreach($roles as $role)
                                                    @if($role->id === 1 && !in_array(1, $userRoles, true) )
                                                        @continue
                                                    @endif
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="checkbox d-flex align-items-center">
                                                                <span class="kt-switch kt-switch--sm kt-switch--icon">
                                                                    <label>
                                                                    {{ html()->checkbox('roles[]', (old('roles') && in_array($role->name, old('roles'), true)), $role->name)
                                                                        ->id('role-'.$role->id) }}
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                &nbsp;&nbsp;
                                                                {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            @if($role->id !== 1 && $role->id !== 2)
                                                                @if($role->permissions->count())
                                                                    @foreach($role->permissions as $permission)
                                                                        <label class="kt-checkbox kt-checkbox--bold">
                                                                            <input type="checkbox" checked="checked" disabled>
                                                                            {{ ucwords($permission->display_name) }} &nbsp;
                                                                            <span></span>
                                                                        </label>
                                                                    @endforeach
                                                                @else
                                                                    <span class='badge badge-success bg-red-600'>{{ __('Ningúno') }}</span>
                                                                @endif
                                                            @else
                                                                <span class='badge badge-success bg-light-blue-a300'>{{ __('Todos los permisos') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <h3 class="kt-portlet__head-title">{{ __('Permisos Adicionales') }}</h3>
                            <div class="kt-separator kt-separator--space-lg kt-separator--border-2x" style="margin-top: 10px; border-bottom: 2px solid #0d47a1;"></div>
                            <table class="table-permissions">
                                <tbody>
                                <tr>
                                    <td>
                                        @if($permissions->count())
                                            <div class="row">
                                                @foreach ($permissions as $key => $module)
                                                    <div class="col-xl-4 col-lg-4 col-sm-1">
                                                        <table class="table-permissions">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    <h4>{{ $key }}</h4>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($module as $permission)
                                                                <tr>
                                                                    <td>
                                                                        <div class="checkboxes">
                                                                                <span class="kt-switch kt-switch--sm kt-switch--icon" style="display: block !important;">
                                                                                    {{ html()->label(
                                                                                        html()->checkbox('permissions[]', (old('permissions') && in_array($permission->name, old('permissions'), true)), $permission->name)
                                                                                              ->id('permission-'.$permission->id)
                                                                                              . '<span></span>')
                                                                                              ->for('permission-'.$permission->id) }}
                                                                                    {{ $permission->display_name }}
                                                                                </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.user.index'), __('Cancelar')) }}
                </div>

                <div class="col text-right">
                    {{ form_submit(__('Crear')) }}
                </div>
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Portlet-->
    {{ html()->form()->close() }}
@endsection
