@extends('layouts.app')

@section('title', app_name() . ' | ' . __('Administración de Perfiles'))

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-lock"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Perfiles') }} <small class="text-muted">{{ __('Perfiles Activos') }}</small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <span class="d-none d-lg-inline" id="ExportButtons"></span>
                        @include('role.includes.header-buttons')
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <table id="tabla-perfiles" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{ __('Perfil') }}</th>
                    <th>{{ __('Permisos') }}</th>
                    <th>{{ __('Número de Usuarios') }}</th>
                    <th>{{ __('Acciones') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $role)
                    @if($role->id === 1 && !in_array(1, $userRoles, true) )
                        @continue
                    @endif
                    <tr>
                        <td>{{ ucwords($role->name) }}</td>
                        <td>
                            @if($role->id === 1 || $role->id === 2)
                                <span class="badge badge-success bg-light-blue-a300">
                                    {{ __('Todos') }}
                                </span>
                            @else
                                @if($role->permissions->count())
                                    @foreach($perm as $module => $permissions)
                                        <strong style="font-weight: 500;">{{ $module }}</strong> ({{ implode(', ', $permissions) }})<br />
                                    @endforeach
                                @else
                                    <span class="badge badge-success bg-red-600">
                                        {{ __('Ninguno') }}
                                    </span>
                                @endif
                            @endif
                        </td>
                        <td>{{ $role->users->count() }} {{ trans_choice('{1} Usuario|[2,*] Usuarios', $role->users->count()) }}</td>
                        <td>@include('role.includes.actions', ['role' => $role])</td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tfoot>
            </table>
        </div>
    </div>
    <!--end::Portlet-->
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            let table = $('#tabla-perfiles').DataTable({
                dom: "<'row mt-4'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                select: true,
                responsive: true,

                initComplete: function () {
                    this.api().columns([0]).every(function () {
                        let column = this;
                        let header = $('#tabla-perfiles').DataTable().column( this.index() ).header() ;
                        let input = document.createElement("input");
                        $(input).attr('class', 'form-control');
                        $(input).attr('placeholder', $(header).html() );

                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                let val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search( val ? '^'+val+'$' : '', true, false ).draw();
                            });
                    });

                    this.api().columns([0, 1]).every(function () {
                        let column = this;
                        let header = $('#tabla-perfiles').DataTable().column( this.index() ).header() ;
                        let input = document.createElement("input");
                        $(input).attr('class', 'form-control');
                        $(input).attr('placeholder', $(header).html() );

                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                let val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? val : '', true, false).draw();
                            });

                    });

                },
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, '{{ __('Todos') }}']],
                columnDefs: [ {
                    targets: [3],
                    orderable: false,
                    searchable: false
                } ],
                aaSorting: [[ 0, 'asc' ]]
            });

            let buttons = new $.fn.dataTable.Buttons(table, {
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Exportar',
                        buttons: [
                            { extend: 'copy',
                                text: '{{ __('Copiar') }}',
                                key: {
                                    key: 'c',
                                    altKey: true
                                }
                            },
                            { extend: 'print',
                                text: '{{ __('Imprimir') }}'
                            },
                            'excel',
                            'csv',
                            'pdf'
                        ]
                    }
                ]
            }).container().appendTo($('#ExportButtons'));

        });
    </script>
@endpush
