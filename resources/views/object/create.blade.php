@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Create an object</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('object.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Object name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection