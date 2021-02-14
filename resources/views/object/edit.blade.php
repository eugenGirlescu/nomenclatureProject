@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Edit an object</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('object.update', $obj->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Object name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $obj->name }}">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    <a href="{{ route('object.index') }}" class="btn btn-primary btn-sm">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection