@extends('layout.master')

@section('content')
<div class="pull-right">
    <p><a class="btn btn-success btn-outline" href="/"><i class="ion ion-home"></i></a></p>
</div>

<div class="clearfix"></div>

@include('dashboard.partials.errors')

<div class="row">
    <div class="col-xs-12 col-lg-offset-2 col-lg-8">
        <div class="panel panel-meassage">
            <div class="panel-heading panel_heading_subscribe">
                <h2 class="text-center">{{ trans('cachet.subscriber.subscribe') }}</h2>
            </div>
            <div class="panel-body">
                <div align="center" class="notification-subs-container">
                    <table>
                        <tr>
                            <td class="notification-name">RSS</td>
                            <td class="notification-url"><input type="text" value="{{ route('feed.rss') }}" id="rss" readonly></td>
                            <td>
                                <button class="copy_btn" onclick="copyToClipboard('rss')">
                                    <span>COPY</span>
                                </button>
                                <img class="some-left-margin" data-toggle="tooltip" data-title="RSS feed" data-container="body" class="log-out-btn" src="/img/question-mark.png" srcset="/img/question-mark@2x.png 2x,/img/question-mark@3x.png 3x">
                        </tr>
                        <tr>
                            <td class="notification-name">ATOM</td>
                            <td class="notification-url"><input type="text" value="{{ route('feed.atom') }}" id="atom" readonly></td>
                            <td>
                                <button class="copy_btn" onclick="copyToClipboard('atom')">
                                    <span>COPY</span>
                                </button>
                                <img class="some-left-margin" data-toggle="tooltip" data-title="ATOM" data-container="body" class="log-out-btn" src="/img/question-mark.png" srcset="/img/question-mark@2x.png 2x,/img/question-mark@3x.png 3x">
                            </td>
                        </tr>
                        <tr>
                            <td class="notification-name">SLACK</td>
                            <td class="notification-url"><input type="text" value="/feed subscribe https://uptime.voxboneworkshop.com/rss" id="slack" readonly></td>
                            <td>
                                <button class="copy_btn" onclick="copyToClipboard('slack')">
                                    <span>COPY</span>
                                </button>
                                <img class="some-left-margin" data-toggle="tooltip" data-title="Copy & paste this command in your slack channel where you want to see notifications" data-container="body" class="log-out-btn" src="/img/question-mark.png" srcset="/img/question-mark@2x.png 2x,/img/question-mark@3x.png 3x">
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="panel-heading">
                    <h2 class="text-center" style="margin-bottom: 40px">Get push notifications</h2>
                </div>

                <div align="center" class="push-notifications-container">
                    <form action="{{ route('subscribe.subscribe', [], false) }}" method="post" class="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="ucontact-subscribe-container">
                                <label for="email" class="subscribe-form-label"><b style="font-size: 18px;">Email</b></label>
                                <input class="form-control subscribe-form-control" type="email" name="email" placeholder="Email address...">
                            </div>
                            <div class="ucontact-subscribe-container">
                                <label for="phoneNum" class="subscribe-form-label"><b style="font-size: 18px;">SMS</b></label>
                                <input class="form-control subscribe-form-control" type="tel" name="phoneNum" placeholder="Mobile Number...">
                            </div>
                        </div>
                        {{--<button type="submit" class="btn btn-success">{{ trans('cachet.subscriber.button') }}</button>--}}
                        <button type="submit" class="btn btn-save-purple"><span style="font-size: 12px;font-weight: bold; color: #ffffff">Save</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function copyToClipboard(elem) {
        var copyText = document.getElementById(elem);
        copyText.select();
        document.execCommand("copy");
        swal({
            type: "info",
            title: "Copied!",
            timer: 1000,
            showConfirmButton: false
        });
    }
</script>
@stop
