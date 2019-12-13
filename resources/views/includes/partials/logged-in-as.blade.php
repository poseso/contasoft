@impersonating
<div class="alert alert-warning logged-in-as">
    {{ __('Usted está conectado actualmente como') }} {{ auth()->user()->name }}.&nbsp;
    <a style="color:black; text-decoration: underline;" href="{{ route('impersonate.leave') }}">
        {{ __('Regresar a tu cuenta') }}
    </a>
</div>
@endImpersonating
