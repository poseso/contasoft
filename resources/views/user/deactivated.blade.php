@extends('layouts.app')

@section('title', app_name() . ' | ' . __('Administración de Usuarios') . ' | ' . __('Usuarios Desactivados'))

@section('breadcrumb-links')
    @include('user.includes.breadcrumb-links')
@endsection

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-users-1"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Usuarios') }} <small class="text-muted">{{ __('Usuarios Desactivados') }}</small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <span class="d-none d-lg-inline" id="ExportButtons"></span>
                        @include('user.includes.header-buttons')
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <table id="tabla-usuarios" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Apellidos') }}</th>
                    <th>{{ __('Usuario') }}</th>
                    <th>{{ __('Dirección de Correo') }}</th>
                    <th>{{ __('Confirmado') }}</th>
                    <th>{{ __('Cuenta Social') }}</th>
                    <th>{{ __('Perfiles') }}</th>
                    <th>{{ __('Otros Permisos') }}</th>
                    <th>{{ __('Última Modificación') }}</th>
                    <th>{{ __('Acciones') }}</th>
                </tr>
                </thead>

                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
            let table = $('#tabla-usuarios').DataTable({
                dom: "<'row mt-4'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('admin.user.get') }}',
                    type: 'post',
                    data: {status: 0, trashed: false},
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                    }
                },
                columns: [
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'confirmed', name: 'confirmed', className: 'text-center'},
                    {data: 'social', name: 'social'},
                    {data: 'roles', name: 'roles'},
                    {data: 'permissions', name: 'permissions'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false, className: 'text-center'}
                ],
                select: true,
                responsive: true,

                initComplete: function () {
                    this.api().columns([0]).every(function () {
                        let column = this;
                        let header = $('#tabla-usuarios').DataTable().column( this.index() ).header() ;
                        let input = document.createElement("input");
                        $(input).attr('class', 'form-control');
                        $(input).attr('placeholder', $(header).html() );

                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                let val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search( val ? '^'+val+'$' : '', true, false ).draw();
                            });
                    });

                    this.api().columns([0, 1, 2, 3, 4]).every(function () {
                        let column = this;
                        let header = $('#tabla-usuarios').DataTable().column( this.index() ).header() ;
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
                    targets: [9],
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
