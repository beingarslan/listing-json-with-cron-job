@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fruits List') }}</div>

                <div class="card-body">
                    <div class="accordion" id="accordionExample">

                        <ul id="myUL">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection