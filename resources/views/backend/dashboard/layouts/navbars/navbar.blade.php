@if (auth()->check() && request()->route()->getName() != null)
    @include('backend.dashboard.layouts.navbars.navs.auth')
@else
    @include('backend.dashboard.layouts.navbars.navs.guest')
@endif