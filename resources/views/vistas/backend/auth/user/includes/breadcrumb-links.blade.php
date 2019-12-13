<div class="btn-group mt-2 mr-4 d-none d-sm-block" role="group" aria-label="Button group">
    <div class="dropdown">
        <a class="btn dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Usuario') }}</a>

        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('admin.auth.user.index') }}">{{ __('Todos los usuarios') }}</a>
            <a class="dropdown-item" href="{{ route('admin.auth.user.create') }}">{{ __('Nuevo usuario') }}</a>
            <a class="dropdown-item" href="{{ route('admin.auth.user.deactivated') }}">{{ __('Usuarios desactivados') }}</a>
            <a class="dropdown-item" href="{{ route('admin.auth.user.deleted') }}">{{ __('Usuarios eliminados') }}</a>
        </div>
    </div><!--dropdown-->
</div><!--btn-group-->