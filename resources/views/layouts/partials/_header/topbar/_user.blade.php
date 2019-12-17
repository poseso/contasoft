<!--begin: User Bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">
	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
		<div class="kt-header__topbar-user">
			<span class="kt-header__topbar-welcome kt-hidden-mobile">
                {{ __('Hola') }},
            </span>

			<span class="kt-header__topbar-username kt-hidden-mobile">
                {{ $logged_in_user->first_name }}
            </span>

			<img class="kt-radius-100" alt="{{ $logged_in_user->email }}" src="{{ $logged_in_user->picture }}" />

			<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
			<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">
                {{ substr($logged_in_user->name, 0, 1) }}
            </span>
		</div>
	</div>

	<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
        @include('layouts.partials._topbar.dropdown.user')
	</div>
</div>
<!--end: User Bar -->
