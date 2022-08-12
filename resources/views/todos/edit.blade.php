@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center my-5">Edit Todo</h1>

        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h5>Edit Todos</h5>
                            <a href="{{route('todos.index')}}" class="btn btn-success">Todos</a>
                        </div>
                        <div class="card-body">

                            <form action="{{route('todos.update', $todo->id)}}" method="POST">

                                @csrf

                                <div class="form-group mb-2">
                                    <input type="text" name='name' placeholder="Todo Name" class="form-control" value="{{$todo->name}}">

                                    @if($errors->first('name'))
                                        <div class='alert alert-danger py-1 mt-1'>{{$errors->first('name')}}</div>
                                    @endif
                                </div>

                                <div class="form-group mb-2">
                                    <textarea name="description" cols="30" rows="5" placeholder="Description" class="form-control">{{$todo->description}}</textarea>

                                    @if($errors->first('description'))
                                        <div class='alert alert-danger py-1 mt-1'>{{$errors->first('description')}}</div>
                                    @endif
                                </div>

                                <div class="form-group text-center mb-2">
                                    <button type="submit" class="btn btn-success">Update Todo</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>



        </div>
    </div>

@endsection
