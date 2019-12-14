@if (config('services.bitbucket.active'))
    <a href='{{ route('frontend.auth.social.login', 'bitbucket') }}' class='btn btn-sm btn-outline-dark m-1' style='height: auto !important;'>
        <i class='fab fa-bitbucket'></i>
        {{ __('Bitbucket') }}
    </a>
@endif

@if (config('services.facebook.active'))
    <a href='{{ route('frontend.auth.social.login', 'facebook') }}' class='btn btn-sm btn-outline-dark m-1' style='height: auto !important;'>
        <i class='fab fa-facebook'></i>
        {{ __('Facebook') }}
    </a>
@endif

@if (config('services.google.active'))
    <a href='{{ route('frontend.auth.social.login', 'google') }}' class='btn btn-sm btn-outline-dark m-1' style='height: auto !important;'>
        <i class='fab fa-google'></i>
        {{ __('Google') }}
    </a>
@endif

@if (config('services.github.active'))
    <a href='{{ route('frontend.auth.social.login', 'github') }}' class='btn btn-sm btn-outline-dark m-1' style='height: auto !important;'>
        <i class='fab fa-github'></i>
        {{ __('GitHub') }}
    </a>
@endif

@if (config('services.linkedin.active'))
    <a href='{{ route('frontend.auth.social.login', 'linkedin') }}' class='btn btn-sm btn-outline-dark m-1' style='height: auto !important;'>
        <i class='fab fa-linkedin'></i>
        {{ __('LinkedIn') }}
    </a>
@endif

@if (config('services.twitter.active'))
    <a href='{{ route('frontend.auth.social.login', 'twitter') }}' class='btn btn-sm btn-outline-dark m-1' style='height: auto !important;'>
        <i class='fab fa-twitter'></i>
        {{ __('Twitter') }}
    </a>
@endif
