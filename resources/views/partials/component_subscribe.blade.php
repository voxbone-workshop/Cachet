<li class="list-group-item {{ $component->group_id ? "sub-component" : "component" }}">
    <input type="hidden" name="componentName" value="{{ $component->name }}">
    <input type="checkbox" name="" value="">

    @if($component->link)
    <a href="{{ $component->link }}" target="_blank" class="links">{{ $component->name }}</a>
    @else
    {{ $component->name }}
    @endif

    @if($component->description)
    <img class="some-left-margin" data-toggle="tooltip" data-title="{{ $component->description }}" data-container="body" src="/img/question-mark.png" srcset="/img/question-mark@2x.png 2x,/img/question-mark@3x.png 3x">
    @endif
</li>
