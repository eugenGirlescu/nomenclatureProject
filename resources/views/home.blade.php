@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">You're logged in!</div>

                <div class="card-body">
                    <p>Your Ip Address : <span>{{ $ip }}</span></p>
                    <a href="{{route('object.create')}}" class="btn btn-success btn-sm">Add an object</a>
                    <a href="{{route('object.index')}}" class="btn btn-success btn-sm">View list</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection