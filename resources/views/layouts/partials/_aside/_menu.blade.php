<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
	<div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
		<ul class="kt-menu__nav" style="padding:0 !important;">
            <li class="kt-menu__section kt-menu__section--first">
                <h4 class="kt-menu__section-text">
                    {{ __('Menú Principal') }}
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>

            <li class="kt-menu__item @if(active_class(Request::is('dashboard'))) kt-menu__item--active @endif" aria-haspopup="true">
                <a href="{{ route('admin.dashboard') }}" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon2-architecture-and-city"></i>
                    <span class="kt-menu__link-text">
                        {{ __('Tablero de Control') }}
                    </span>
                </a>
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="kt-menu__section kt-menu__section--first">
                    <h4 class="kt-menu__section-text">
                        {{ __('Menú de Seguridad') }}
                    </h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu {{ active_class(Request::is('user*'), 'kt-menu__item--open kt-menu__item--active') }}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle {{ active_class(Request::is('user*')) }}">
                        <i class="kt-menu__link-icon flaticon-users-1"></i>
                        <span class="kt-menu__link-text">
                            {{ __('Usuarios') }}
                        </span>

                        @if ($pending_approval > 0)
                            <span class="kt-menu__link-badge">
                                <span class="kt-badge kt-badge--warning kt-badge--md">
                                    {{ $pending_approval }}
                                </span>
                            </span>
                        @endif
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item @if(active_class(Route::is('admin.user.index'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('admin.user.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                        <span></span>
                                    </i>

                                    <span class="kt-menu__link-text">
                                        {{ __('Listado de Usuarios') }}
                                    </span>

                                    @if ($pending_approval > 0)
                                        <span class="kt-menu__link-badge">
                                            <span class="kt-badge kt-badge--warning">
                                                {{ $pending_approval }}
                                            </span>
                                        </span>
                                    @endif
                                </a>
                            </li>

                            <li class="kt-menu__item @if(active_class(Route::is('admin.user.create'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('admin.user.create') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                        <span></span>
                                    </i>

                                    <span class="kt-menu__link-text">
                                        {{ __('Nuevo Usuario') }}
                                    </span>
                                </a>
                            </li>

                            <li class="kt-menu__item @if(active_class(Route::is('admin.user.deactivated'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('admin.user.deactivated') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                        <span></span>
                                    </i>

                                    <span class="kt-menu__link-text">
                                        {{ __('Usuarios Desactivados') }}
                                    </span>
                                </a>
                            </li>

                            <li class="kt-menu__item @if(active_class(Route::is('admin.user.deleted'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('admin.user.deleted') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                        <span></span>
                                    </i>

                                    <span class="kt-menu__link-text">
                                        {{ __('Usuarios Eliminados') }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu {{ active_class(Request::is('role*'), 'kt-menu__item--open kt-menu__item--active') }}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle {{ active_class(Request::is('role*')) }}">
                        <i class="kt-menu__link-icon flaticon-safe-shield-protection"></i>
                        <span class="kt-menu__link-text">
                            {{ __('Perfiles') }}
                        </span>

                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item @if(active_class(Route::is('admin.user.role.index'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('admin.user.role.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                        <span></span>
                                    </i>

                                    <span class="kt-menu__link-text">
                                        {{ __('Listado de Perfiles') }}
                                    </span>
                                </a>
                            </li>

                            <li class="kt-menu__item @if(active_class(Route::is('admin.user.role.create'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('admin.user.role.create') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                        <span></span>
                                    </i>

                                    <span class="kt-menu__link-text">
                                        {{ __('Nuevo Perfil') }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu {{ active_class(Request::is('log-viewer*'), 'kt-menu__item--open kt-menu__item--active') }}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="kt-menu__link kt-menu__toggle {{ active_class(Request::is('log-viewer*')) }}">
                        <i class="kt-menu__link-icon flaticon-security"></i>
                        <span class="kt-menu__link-text">
                            {{ __('Logs de Errores') }}
                        </span>

                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item @if(active_class(Route::is('log-viewer::dashboard'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('log-viewer::dashboard') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                        <span></span>
                                    </i>

                                    <span class="kt-menu__link-text">
                                        {{ __('Principal') }}
                                    </span>
                                </a>
                            </li>

                            <li class="kt-menu__item @if(active_class(Route::is('log-viewer::logs.list*'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('log-viewer::logs.list') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--line">
                                        <span></span>
                                    </i>

                                    <span class="kt-menu__link-text">
                                        {{ __('Logs') }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu {{ active_class(Request::is('backup*'), 'kt-menu__item--open kt-menu__item--active') }}"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:" class="kt-menu__link kt-menu__toggle {{ active_class(Request::is('backup*')) }}">
                        <i class="kt-menu__link-icon flaticon-refresh"></i>
                        <span class="kt-menu__link-text">
                            {{ __('Copias de Seguridad') }}
                        </span>

                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item @if(active_class(Route::is('admin.backup.index*'))) kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{{ route('admin.backup.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">
                                        {{ __('Listado de copias de seguridad') }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item @if(active_class(Request::is('logs/user*'))) kt-menu__item--active @endif" aria-haspopup="true">
                    <a href="{{ route('admin.user.logs.index') }}" class="kt-menu__link">
                        <i class="kt-menu__link-icon flaticon-graphic"></i>
                        <span class="kt-menu__link-text">
                            {{ __('Eventos') }}
                        </span>
                    </a>
                </li>
            @endif

            <li class="kt-menu__section kt-menu__section--first">
                <h4 class="kt-menu__section-text">
                    {{ __('Configuraciones') }}
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>

            <li class="kt-menu__section kt-menu__section--first">
                <h4 class="kt-menu__section-text">
                    {{ __('Reportes') }}
                </h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>

            <li class="kt-menu__item @if(active_class(Route::is('admin.dashboard.colores*'))) kt-menu__item--active @endif" aria-haspopup="true">
                <a href="{{ route('admin.dashboard.colores') }}" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon-graphic"></i>
                    <span class="kt-menu__link-text">
                        {{ __('Paleta de Colores') }}
                    </span>
                </a>
            </li>
		</ul>
	</div>
</div>
<!-- end:: Aside Menu -->
