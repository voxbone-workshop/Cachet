<div class="panel panel-message incident">
    <div class="panel-heading">
        @if($current_user)
        <div class="pull-right btn-group">
            <a href="{{ route('dashboard.incidents.edit', ['id' => $incident->id]) }}" class="btn btn-default">{{ trans('forms.edit') }}</a>
            <a href="{{ route('dashboard.incidents.delete', ['id' => $incident->id]) }}" class="btn btn-danger confirm-action" data-method='DELETE'>{{ trans('forms.delete') }}</a>
        </div>
        @endif

        <div>
            @if($with_link)
            <a href="{{ route('incident', ['id' => $incident->id]) }}" class="links">
                <span class="label label-default">
                    <abbr class="timeago" data-toggle="tooltip" data-placement="right" title="{{ $incident->timestamp_formatted }}" data-timeago="{{ $incident->timestamp_iso }}"></abbr>
                </span>
            </a>
            @else
                <span class="label label-default">
                    <abbr class="timeago" data-toggle="tooltip" data-placement="right" title="{{ $incident->timestamp_formatted }}" data-timeago="{{ $incident->timestamp_iso }}"></abbr>
                </span>
            @endif

            @if($incident->component)
                <span class="label label-default">{{ $incident->component->name }}</span>
            @endif
        </div>
        <h4><strong>{{ $incident->name }}</strong></h4>{{ $incident->isScheduled ? trans("cachet.incidents.scheduled_at", ["timestamp" => $incident->scheduled_at_diff]) : null }}
    </div>
    <div class="panel-body _markdown-body">
        {!! $incident->formattedMessage !!}
    </div>
</div>
