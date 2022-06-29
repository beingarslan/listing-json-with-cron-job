<ul class="nested">
    @foreach($fruites as $fruite)
    <li>
        <span class="caret">
            {{$fruite->label}} ({{$fruite->children->count()}})
        </span>
        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$fruite->id}}">
            Edit
        </button>
        <x-edit-component :fruit="$fruite" />


        @if($fruite->children->count() > 0)
        <x-list-component :id="$fruite->id" />
        @endif
    </li>
    @endforeach
</ul>