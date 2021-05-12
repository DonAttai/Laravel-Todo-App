@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <form action="/todos" method="POST" autocomplete="off">
                @csrf
                <div class="form-group mb-0">
                    <input type="text" name="title" class="form-control mb-1" placeholder="Enter a todo item...">

                    @error('title')<p class="text-danger">{{$message}}</p>@enderror

                </div>
                <button class=" form-control btn btn-primary float-right">Add Item</button>
            </form>
            <h4 class="text-center pt-4 mt-5">Todo Items</h4>

            <div class="card">
                <ul class="list-group">
                    @forelse (Auth::user()->todos as $todo)
                    <div class="">
                        <li class="list-group-item d-flex justify-content-between">
                            <h5>{{$todo->title}}</h5>

                            <span>
                                <a href="/todos/{{$todo->id}}/edit" class="btn btn-primary btn-sm"
                                    role="button">Edit</a>
                                <div class="d-inline">
                                    <form action="/todos/{{$todo->id}}" method="POST" class="d-inline">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>

                            </span>

                        </li>

                    </div>
                    @empty
                    <li class="list-group-item">No Todo items available</li>


                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection