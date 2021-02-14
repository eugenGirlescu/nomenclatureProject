@extends('layouts.app')

@section('content')

@auth

<h1 class="text-center">
    Hello my friend!
</h1>
<div class="col text-center">
    <a href="{{ route('object.index') }}" class="btn btn-primary">View list</a>
    <a href="{{ route('object.create') }}" class="btn btn-danger">Create object</a>
</div>
@else
<div class="container">
    <div class="row">
        <h1 class="text-center">
            Welcome
        </h1>
        <h2 class="text-center">
            Please sign-in to create an object.If you don't have an account, please sign up first!
        </h2>
    </div>
</div>
@endauth

@endsection