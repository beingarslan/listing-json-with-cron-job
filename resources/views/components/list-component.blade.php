<ul class="nested">
    @foreach($fruits as $fruit)
    <li>
        <span class="caret">
            {{$fruit->label}} 
        </span>
        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$fruit->id}}">
            Edit
        </button>
        <x-edit-component :fruit="$fruit" />


        @if($fruit->children->count() > 0)
        <x-list-component :id="$fruit->id" />
        @endif
    </li>
    @endforeach
</ul>