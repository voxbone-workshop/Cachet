<div class="navigation">
    <a href="/" id="top" class="navigation_logo">
        @if($app_banner)
            <img src="data:{{ $app_banner_type }};base64, {{ $app_banner }}" class="banner-image img-responsive">
        @else
            <img src="img/vb-logo-status-white.svg" class="banner-image img-responsive">
            <span class="uptime-logo-text-part">UPTIME</span>
        @endif
    </a>
    <div class="navigation_extras">
        <a href="https://support.voxbone.com/hc/en-us/requests/new" class="navbar-btn-default">
            Contact Support
        </a>
        <div class="subscribe-btn-container">
            <img src="img/green-button-sign-up.svg" class="diagonal-green">
            <span class="navigation_subscribe"><a href="{{ route('subscribe.subscribe') }}" class="nav_btn"><strong>Subscribe</strong></a></span>
        </div>
        @if($current_user)
            <a class="btn btn-log-out" href="/auth/logout"><img class="log-out-btn" src="img/logout-button.svg"></a>
        @endif
    </div>
</div>




