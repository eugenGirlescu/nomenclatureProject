@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">You're logged in!</div>

                <div class="card-body">
                    <a href="{{route('object.create')}}" class="btn btn-success">Add an object</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection