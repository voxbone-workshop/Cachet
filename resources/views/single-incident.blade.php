@extends('layout.master')

@section('content')

<div class="section-title-map text-center">
    @include('partials.map-single-incident')
</div>

<div class="container main-container">
    <div class="section-timeline">
        <div class="underline">
            <h4>{{ formatted_date($incident->date) }}</h4>
        </div>
        <div class="timeline">
            <div class="content-wrapper">
                <div class="moment first">
                    <div class="row event clearfix">
                        <div class="col-sm-1">
                            <div class="status-icon status-{{ $incident->status }}" data-toggle="tooltip" title="{{ $incident->human_status }}" data-placement="left">
                                <i class="{{ $incident->icon }}"></i>
                            </div>
                        </div>
                        <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                            @include('partials.incident', ['incident' => $incident, 'with_link' => false])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
