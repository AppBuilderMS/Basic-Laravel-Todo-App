@extends('layouts.app')
@section('title')
    Todos List : {{$todo->name}}
@endsection
@section('content')
    <div class="container">
        <h1 class='text-center my-5'>{{ $todo->name }}</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card crad-default">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h5>Details</h5>
                        <a href="{{route('todos.index')}}" class="btn btn-success">Todos</a>
                    </div>

                    <div class="card-body">
                        {{ $todo->description }}
                    </div>

                </div>

                @if(! $todo->completed)
                    <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-info my-2">Edit</a>
                @else
                    <a href="{{route('todos.recomplete', $todo->id)}}" class="btn btn-secondary my-2">Recomplete</a>
                @endif
                <a href="{{route('todos.destroy', $todo->id)}}" class="btn btn-danger my-2">Delete</a>

            </div>
        </div>


    </div>
@endsection
