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
        <a href="/dashboard" class="navbar-btn-default">
            Dashboard
        </a>
        <a href="/rss" class="navbar-btn-default">
            RSS
        </a>
        <a href="/atom" class="navbar-btn-default">
            Atom
        </a>
        <div class="subscribe-btn-container">
            <img src="img/green-button-sign-up.svg" class="diagonal-green">
            <span class="navigation_subscribe"><a href="/subscribe" class="nav_btn"><strong>Subscribe</strong></a></span>
        </div>
        <a class="btn btn-log-out" href="/auth/logout"><img class="log-out-btn" src="img/logout-button.svg"></a>
    </div>
</div>




