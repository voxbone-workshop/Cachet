@extends('layout.master')

@section('content')

<div class="clearfix"></div>

@include('dashboard.partials.errors')

<div class="row">
    <div class="col-xs-12 col-lg-offset-2 col-lg-8">
        <div class="panel panel-message">
            <!-- <div class="text-center margin-bottom"> -->
            <div class="panel-heading panel_heading_subscribe">
                <h1>{{ $app_name }} Notifications</h1>
                <p>
                    Manage notifications for email: {{ $subscriber->email }} & sms: {{ $subscriber->sms ? $subscriber->sms : '-' }}
                </p>
            </div>
            @if($components->count() > 0)
            <div class="panel-body">
                <form action="{{ route('subscribe.manage', $subscriber->verify_code) }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('cachet.subscriber.manage.my_subscriptions') }}
                        </div>
                        <div class="list-group">
                            @foreach($components as $component)
                            <div class="list-group-item">
                                <div class="checkbox">
                                    <label for="component-{{ $component->id }}">
                                        <input type="checkbox"
                                            id="component-{{ $component->id }}"
                                            name="subscriptions[]"
                                            value="{{ $component->id }}"
                                            @if (in_array($component->id, $subscriptions) || $subscriber->global)
                                                checked="checked"
                                            @endif>
                                            {{ $component->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-purple btn-lg">Update Subscription</button>
                    </div>
                </form>
            </div>
            @else
            <div class="panel-body">
                <p>{{ trans('cachet.subscriber.manage.no_subscriptions') }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@stop
