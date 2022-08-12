@extends('layouts.app')
@section('title')
    Todos List
@endsection
@section('content')
    <div class="container">
        <h1 class='text-center my-5'>TODOS PAGE</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <di class="card crad-default">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <h5>Todos</h5>
                        <a href="{{route('todos.create')}}" class="btn btn-success">Create New</a>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($todos as $todo)
                                <li class="list-group-item d-flex justify-content-between">
                                    <h5 style="text-decoration: {{$todo->completed ? 'line-through' : ''}}">{{$todo->name}}</h5>
                                    <div>
                                        @if(! $todo->completed)
                                            <a href='{{route('todos.complete', $todo->id)}}' class="btn btn-warning btn-sm">complete</a>
                                        @endif
                                        <a href='{{route('todos.show', $todo->id)}}' class="btn btn-primary btn-sm mr-1 ml-1">View</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </di>
            </div>
        </div>
    </div>
@endsection
