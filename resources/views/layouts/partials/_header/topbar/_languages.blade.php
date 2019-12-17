<!--begin: Language bar -->
@if(config('locale.status') && count(config('locale.languages')) > 1)
    <div class="kt-header__topbar-item kt-header__topbar-item--langs">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <i class="fas fa-globe-americas"></i>
            </span>
        </div>

        @include('layouts.partials._topbar.dropdown.languages')
    </div>
@endif
<!--end: Language bar -->
