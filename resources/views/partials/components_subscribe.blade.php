<style type="text/css" media="screen">
    #myInput {
        background-image: url('/css/searchicon.png'); /* Add a search icon to input */
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
    }

    #myUL {
        /* Remove default list styling */
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #myUL li a {
        border: 1px solid #ddd; /* Add a border to all links */
        margin-top: -1px; /* Prevent double borders */
        background-color: #f6f6f6; /* Grey background color */
        padding: 12px; /* Add some padding */
        text-decoration: none; /* Remove default text underline */
        font-size: 18px; /* Increase the font-size */
        color: black; /* Add a black text color */
        display: block; /* Make it into a block element to fill the whole list */
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee; /* Add a hover effect to all links, except for headers */
    }
</style>

@if($component_groups->count() > 0)
@foreach($component_groups as $componentGroup)

<ul id="li{{ $componentGroup->id }}" class="list-group components">
    <li class="list-group-item group-name">
        <input type="checkbox" name="" value="" />
        <strong>{{ $componentGroup->name }}</strong>
        <div class="pull-right larger text-inline xgroup-name-action">
            <i class="ion-minus group-toggle plus-minus-toggle"></i>
        </div>
    </li>

    <li class="list-group-item group-search">
        <div class="input-group">
            <span class="input-group-addon"><i class="icon ion-search"></i></span>
            <input type="text" id="searchBox{{ $componentGroup->id }}"  class="form-control" onkeyup="searchBox('searchBox{{ $componentGroup->id }}', 'li{{ $componentGroup->id }}')" placeholder="Start typing a country name...">
        </div>
    </li>

    <div class="group-items">
        @foreach($componentGroup->components()->orderBy('name')->get() as  $component)
        @include('partials.component_subscribe', compact($component))
        @endforeach
    </div>
</ul>
@endforeach
@endif
