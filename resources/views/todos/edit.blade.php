@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <form action="/todos/{{$todo->id}}" method="POST" autocomplete="off">
                @method('PATCH')
                @csrf
                <div class="form-group mt-5 mb-0">
                    <input type="text" name="title" class="form-control mb-1" value="{{$todo->title}}">

                    @error('title')<p class="text-danger">{{$message}}</p>@enderror

                </div>
                <button class=" form-control btn btn-primary float-right">Save Todo</button>
            </form>
        </div>
    </div>
</div>
@endsection