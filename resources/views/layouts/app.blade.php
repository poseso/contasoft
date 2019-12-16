<!DOCTYPE html>
<!--
Producto: Sistema Integrado de Gestión Contable
Autor: Carlos Sánchez
Website: http://www.modocreativo.net/
Contacto: carlos@modocreativo.net
-->
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <!-- ======================================================================================================================================
        TITLE
        ======================================================================================================================================= -->
        <title>@yield('title', app_name())</title>
        <!-- ======================================================================================================================================
        BASIC META TAGS
        ======================================================================================================================================= -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="keywords" content="Accounting, Finance, Factura, Quotes, Facturacion, Contabilidad, Contable"/>
        <meta name="copyright" content="Modo Creativo S.R.L.">
        <meta name="language" content="spanish">
        <meta name="robots" content="index,follow" />
        <meta name="revised" content="Sabado, 14 de diciembre, 2019, 09:57 am" />
        <meta name="topic" content="Sistema Integrado de Gestión Contable - Contasoft">
        <meta name="Classification" content="Accounting">
        <meta name="description" content="@yield('meta_description', 'Sistema Integrado de Gestión Contable')">
        <meta name="author" content="@yield('meta_author', 'Carlos Sánchez')">
        <meta name="owner" content="Modo Creativo S.R.L.">
        <meta name="url" content="http://www.modocreativo.net">
        <meta name="coverage" content="Worldwide">
        <meta name="distribution" content="Global">
        <meta name="rating" content="General">
        <meta name="googlebot" content="index follow noodp" />
        <!-- ======================================================================================================================================
        APPLE META TAGS
        ======================================================================================================================================= -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <!-- ======================================================================================================================================
        FAVICON
        ======================================================================================================================================= -->
        <link rel="shortcut icon" type="ico" href="{{ asset('ico/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('ico/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('ico/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('ico/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('ico/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('ico/manifest.json') }}">
        <!-- ======================================================================================================================================
        OPENGRAPH META TAGS
        ======================================================================================================================================= -->
        <meta name="og:country-name" content="DO"/>
        <meta name="og:title" content="Sistema Integrado de Gestión Contable"/>
        <meta name="og:type" content="Accounting"/>
        <meta name="og:url" content="http://www.contasoft.com.do"/>
        <meta name="og:image" content="http://www.contasoft.com.do/logo.png"/>
        <meta name="og:site_name" content="Contasoft"/>
        <meta name="og:description" content="Sistema de Facturacion en Linea"/>
        <meta name="fb:page_id" content="123456789012" />
        <meta name="og:email" content="info@contasoft.com.do"/>
        <!-- ======================================================================================================================================
        PARA PANTALLAS CON RETINA Y APPLE / iOS WEB APPS / iPHONES
        ======================================================================================================================================= -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('ico/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('ico/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('ico/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('ico/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('ico/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('ico/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('ico/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('ico/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('ico/apple-icon-180x180.png') }}">
        <!-- ======================================================================================================================================
        MICROSOFT CLEAR TYPE RENDERING
        ======================================================================================================================================= -->
        <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
        <!--end::Fonts -->

        @yield('meta')

        {{-- See https://laravel.com/docs/6.x/blade#stacks for usage --}}
        @stack('before-styles')

        <!--begin::Global Theme Styles(used by all pages) -->
        {{ style(mix('css/style.bundle.css')) }}
        <!--end::Global Theme Styles -->

        @stack('after-styles')
        <!--begin::Layout Skins(used by all pages) -->
        <link href="{{ asset('css/skins/header/base/dark.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/skins/header/menu/dark.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Layout Skins -->
    </head>

<!-- begin::Body -->
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin::Page loader -->
@include('layouts.partials._page-loader')
<!-- end::Page Loader -->

<!-- begin:: Page -->
@include('layouts.partials._header.base-mobile')
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @include('layouts.partials._aside.base')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            @include('layouts.partials._header.base')
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                @include('layouts.partials._subheader.subheader-v1')
                @include('layouts.partials._content.base')
            </div>
            @include('layouts.partials._footer.base')
        </div>
    </div>
</div>
<!-- end:: Page -->

@include('layouts.partials._topbar.offcanvas.search')
@include('layouts.partials._quick-panel')
@include('layouts.partials._scrolltop')
@include('layouts.partials._chat')

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile kt-header-mobile--fixed">
    <div class="kt-header-mobile__logo">
        <a href="{{ route('admin.dashboard') }}">
            <img width="150" alt="Logo" src="{{ asset('media/logos/contasoft-white.svg') }}">
        </a>
    </div>

    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler">
            <span></span>
        </button>

        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler">
            <span></span>
        </button>

        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler">
            <i class="flaticon-more"></i>
        </button>
    </div>
</div>
<!-- end:: Header Mobile -->

<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @include('includes.aside')
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            @include('includes.header')
            @include('includes.partials.read-only')
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                <!-- begin:: Content -->
                <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
                    @include('includes.partials.messages')
                    @yield('content')
                </div>
                <!-- end:: Content -->
            </div>
            @include('includes.footer')
            <!-- Scripts -->
            @stack('before-scripts')
            <!--begin::Global Theme Bundle (used by all pages) -->
            {!! script(mix('js/manifest.js')) !!}
            {!! script(mix('js/vendor.js')) !!}
            {!! script(mix('js/app.bundle.js')) !!}
            <!--end::Global Theme Bundle -->

            @stack('after-scripts')
            {!! script(mix('js/custom.bundle.js')) !!}
        </div>
    </div>
</div>
<!-- end:: Page -->

<!-- begin::Quick Panel -->
<div id="kt_quick_panel" class="kt-quick-panel">
    <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
    <div class="kt-quick-panel__nav">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand kt-notification-item-padding-x" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#kt_notifications" role="tab">
                    {{ __('Notificaciones') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_logs" role="tab">
                    {{ __('Auditoría') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_settings" role="tab">
                    {{ __('Ajustes') }}
                </a>
            </li>
        </ul>
    </div>
    <div class="kt-quick-panel__content">
        <div class="tab-content">
            <div class="tab-pane fade show kt-scroll active" id="kt_notifications" role="tabpanel">
                <div class="kt-notification">
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-line-chart kt-font-success"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> New order has been received </div>
                            <div class="kt-notification__item-time"> 2 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-box-1 kt-font-brand"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> New customer is registered </div>
                            <div class="kt-notification__item-time"> 3 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-chart2 kt-font-danger"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> Application has been approved </div>
                            <div class="kt-notification__item-time"> 3 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-image-file kt-font-warning"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> New file has been uploaded </div>
                            <div class="kt-notification__item-time"> 5 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-bar-chart kt-font-info"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> New user feedback received </div>
                            <div class="kt-notification__item-time"> 8 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-pie-chart-2 kt-font-success"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> System reboot has been successfully completed </div>
                            <div class="kt-notification__item-time"> 12 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-favourite kt-font-danger"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> New order has been placed </div>
                            <div class="kt-notification__item-time"> 15 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item kt-notification__item--read">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-safe kt-font-primary"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> Company meeting canceled </div>
                            <div class="kt-notification__item-time"> 19 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-psd kt-font-success"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> New report has been received </div>
                            <div class="kt-notification__item-time"> 23 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon-download-1 kt-font-danger"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> Finance report has been generated </div>
                            <div class="kt-notification__item-time"> 25 hrs ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon-security kt-font-warning"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> New customer comment recieved </div>
                            <div class="kt-notification__item-time"> 2 days ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-pie-chart kt-font-warning"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title"> New customer is registered </div>
                            <div class="kt-notification__item-time"> 3 days ago </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab-pane fade kt-scroll" id="kt_logs" role="tabpanel">
                <div class="kt-notification-v2">
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon"> <i class="flaticon-bell kt-font-brand"></i> </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title"> 5 new user generated report </div>
                            <div class="kt-notification-v2__item-desc"> Reports based on sales </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon"> <i class="flaticon2-box kt-font-danger"></i> </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title"> 2 new items submited </div>
                            <div class="kt-notification-v2__item-desc"> by Grog John </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon"> <i class="flaticon-psd kt-font-brand"></i> </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title"> 79 PSD files generated </div>
                            <div class="kt-notification-v2__item-desc"> Reports based on sales </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon"> <i class="flaticon2-supermarket kt-font-warning"></i> </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title"> $2900 worth producucts sold </div>
                            <div class="kt-notification-v2__item-desc"> Total 234 items </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon"> <i class="flaticon-paper-plane-1 kt-font-success"></i> </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title"> 4.5h-avarage response time </div>
                            <div class="kt-notification-v2__item-desc"> Fostest is Barry </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon"> <i class="flaticon2-information kt-font-danger"></i> </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title"> Database server is down </div>
                            <div class="kt-notification-v2__item-desc"> 10 mins ago </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon"> <i class="flaticon2-mail-1 kt-font-brand"></i> </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title"> System report has been generated </div>
                            <div class="kt-notification-v2__item-desc"> Fostest is Barry </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon"> <i class="flaticon2-hangouts-logo kt-font-warning"></i> </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title"> 4.5h-avarage response time </div>
                            <div class="kt-notification-v2__item-desc"> Fostest is Barry </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_settings" role="tabpanel">
                <form class="kt-form">
                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Notifications:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--success kt-switch--sm">
                                <label>
                                    <input type="checkbox" checked="checked" name="quick_panel_notifications_1">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Case Tracking:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--success kt-switch--sm">
                                <label>
                                    <input type="checkbox" name="quick_panel_notifications_2">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Support Portal:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--success kt-switch--sm">
                                <label>
                                    <input type="checkbox" checked="checked" name="quick_panel_notifications_2">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Generate Reports:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--danger">
                                <label>
                                    <input type="checkbox" checked="checked" name="quick_panel_notifications_3">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Report Export:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--danger">
                                <label>
                                    <input type="checkbox" name="quick_panel_notifications_3">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Allow Data Collection:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--danger">
                                <label>
                                    <input type="checkbox" checked="checked" name="quick_panel_notifications_4">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Member singup:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--brand">
                                <label>
                                    <input type="checkbox" checked="checked" name="quick_panel_notifications_5">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--brand">
                                <label>
                                    <input type="checkbox" name="quick_panel_notifications_5">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Enable Customer Portal:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--brand">
                                <label>
                                    <input type="checkbox" checked="checked" name="quick_panel_notifications_6">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end::Quick Panel -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop"><i class="fa fa-arrow-up"></i></div>
<!-- end::Scrolltop -->

{{--@include('backend.includes.toolbar')--}}
@include('includes.chat')

<script>
    $(document).ready(function () {
        $('div.alert').not('.alert-solid-danger, .alert-solid-warning, .alert-solid-info, .alert-danger, .alert-info, .alert-warning').delay(6000).slideUp(500);
    });
</script>

</body>
</html>
