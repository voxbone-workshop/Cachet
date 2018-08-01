@if($component_groups->count() > 0)
@foreach($component_groups as $componentGroup)

<ul id="li{{ $componentGroup->id }}" class="list-group components">
    <li class="list-group-item group-name-subscribe">
        <input type="checkbox" name="" value="" />
        <strong>{{ $componentGroup->name }}</strong>
        <div class="pull-right larger text-inline group-name-subscribe-action">
            <i class="ion-minus group-toggle plus-minus-toggle"></i>
        </div>
    </li>

    <div class="group-items">
        <li class="list-group-item group-search">
            <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-search"></i></span>
                <input type="text" id="searchBox{{ $componentGroup->id }}"  class="form-control" onkeyup="searchBox('searchBox{{ $componentGroup->id }}', 'li{{ $componentGroup->id }}')" placeholder="Start typing a country name...">
            </div>
        </li>

        @foreach($componentGroup->components()->orderBy('name')->get() as  $component)
        @include('partials.component_subscribe', compact($component))
        @endforeach
    </div>
</ul>
@endforeach
@endif
