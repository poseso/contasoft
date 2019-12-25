@if ($user->trashed())
    <div class="dropdown">
        <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
            <i class="flaticon-more-1"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('admin.user.restore', $user) }}" name="confirm_item" class="dropdown-item">
                {{ __('Restaurar') }}
            </a>

            <a href="{{ route('admin.user.delete-permanently', $user) }}" name="confirm_item" class="dropdown-item">
                {{ __('Eliminar Permanentemente') }}
            </a>
        </div>
    </div>
@else
    <div class="dropdown">
        <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
            <i class="flaticon-more-1"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('admin.user.show', $user) }}" class="dropdown-item">
                {{ __('Visualizar') }}
            </a>

            <a href="{{ route('admin.user.edit', $user) }}" class="dropdown-item">
                {{ __('Modificar') }}
            </a>

            @if ($user->id !== auth()->id())
                <a href="{{ route('admin.user.clear-session', $user) }}"
                   data-trans-button-cancel="{{ __('Cancelar') }}"
                   data-trans-button-confirm="{{ __('Continuar') }}"
                   data-trans-title="{{ __('Está seguro?') }}"
                   class="dropdown-item" name="confirm_item">{{ __('Eliminar sesión') }}</a>
            @endif

            @canBeImpersonated($user)
            <a href="{{ route('impersonate', $user->id) }}" class="dropdown-item"> {{ __('Iniciar sesión como :user', ['user' => $user->full_name]) }}</a>
            @endCanBeImpersonated

            <a href="{{ route('admin.user.change-password', $user) }}" class="dropdown-item">{{ __('Cambiar contraseña') }}</a>

            @if ($user->id !== auth()->id())
                @switch($user->active)
                    @case(0)
                    <a href="{{ route('admin.user.mark', [$user, 1,]) }}" class="dropdown-item">{{ __('Activar') }}</a>
                    @break

                    @case(1)
                    <a href="{{ route('admin.user.mark', [$user, 0]) }}" class="dropdown-item">{{ __('Desactivar') }}</a>
                    @break
                @endswitch
            @endif

            @if (! $user->isConfirmed() && ! config('access.users.requires_approval'))
                <a href="{{ route('admin.user.account.confirm.resend', $user) }}" class="dropdown-item">{{ __('Reenviar correo de confirmación') }}</a>
            @endif

            @if ($user->id !== 1 && $user->id !== auth()->id())
                <a href="{{ route('admin.user.destroy', $user) }}"
                   data-method="delete"
                   data-trans-button-cancel="{{ __('Cancelar') }}"
                   data-trans-button-confirm="{{ __('Eliminar') }}"
                   data-trans-title="{{ __('Está seguro?') }}"
                   class="dropdown-item">{{ __('Eliminar') }}</a>
            @endif
        </div>
    </div>
@endif
