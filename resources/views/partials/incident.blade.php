<div class="panel panel-message incident">
    <div class="panel-heading">
        @if($current_user)
        <div class="pull-right btn-group">
            <a href="{{ route('dashboard.incidents.edit', ['id' => $incident->id]) }}" class="btn btn-default">{{ trans('forms.edit') }}</a>
            <a href="{{ route('dashboard.incidents.delete', ['id' => $incident->id]) }}" class="btn btn-danger confirm-action" data-method='DELETE'>{{ trans('forms.delete') }}</a>
        </div>
        @endif

        <div class="labels">
            @if($with_link)
                <a href="{{ route('incident', ['id' => $incident->id]) }}" class="links">
                    <span class="label label-default label-timeago status-{{ $incident->status }}">
                        {{ strtoupper($incident->human_status) }} at {{ $incident->timestamp_formatted }}
                    </span>
                </a>
            @else
                <span class="label label-default label-timeago status-{{ $incident->status }}">
                    {{ strtoupper($incident->human_status) }} at {{ $incident->timestamp_formatted }}
                </span>
            @endif

            @if($incident->component)
                <span class="label label-default label-component">{{ $incident->component->name }}</span>
            @endif
        </div>
        <h4><strong>{{ $incident->name }}</strong></h4>{{ $incident->isScheduled ? trans("cachet.incidents.scheduled_at", ["timestamp" => $incident->scheduled_at_diff]) : null }}
    </div>
    <div class="panel-body _markdown-body">
        {!! $incident->formattedMessage !!}
    </div>
</div>
