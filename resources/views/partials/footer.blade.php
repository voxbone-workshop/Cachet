@if($app_footer)
{!! $app_footer !!}
@else
<footer class="footer bottomed-abs">
    <div class="footer_rectangle">
        <div class="footer__return"><a class="footer_to_top_rectangle" href="#top" >
                <span class="u-content--upper" >Top</span>
                <img class="log-out-btn" src="/img/up-arrow-small-white.svg">
            </a>
        </div>
        <div class="row">
            <div class="col-sm-12 footer_first_line">
                <ul class="list-inline">
                    @if($current_user)
                        <li>
                            <a class="btn btn-link" href="/dashboard">{{ trans('dashboard.dashboard') }}</a>
                        </li>
                        <li>
                            <a class="btn btn-link" href="/auth/logout">{{ trans('dashboard.logout') }}</a>
                        </li>
                    @endif
                    <li>
                        <a class="btn btn-link" href="{{ route('feed.rss') }}">{{ trans('cachet.rss-feed') }}</a>
                    </li>
                    <li>
                        <a class="btn btn-link" href="{{ route('feed.atom') }}">{{ trans('cachet.atom-feed') }}</a>
                    </li>
<!--                     @if(subscribers_enabled())
                        <li>
                            <a class="btn btn-success btn-outline" href="{{ route('subscribe.subscribe') }}">{{ trans('cachet.subscriber.button') }}</a>
                        </li>
                    @endif -->
                </ul>
            </div>
        </div>
        <div class="row" >
            <div class="col-sm-12 footer_subtext">
                <ul class="footer_legals">
                    <li><a href="/acceptable-use-policy" class="btn btn-link">
                            Acceptable Use Policy
                        </a>
                    </li>
                    <li><a href="/cookie-policy" class="btn btn-link">
                            Cookie Policy
                        </a>
                    </li>
                    <li><a href="/privacy-policy" class="btn btn-link">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
                <div class="footer_copyright">Copyright Voxbone © 2018</div>
            </div>
        </div>
    </div>
</footer>
@endif

@include("partials.analytics")
