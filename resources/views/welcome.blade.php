@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fruites List') }}</div>

                <div class="card-body">
                    <div class="accordion" id="accordionExample">

                        <ul id="myUL">
                            @foreach($fruites as $fruite)
                            <li>
                                <span class="caret">
                                    {{$fruite->label}}
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection