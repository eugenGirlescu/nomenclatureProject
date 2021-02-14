@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if(auth()->check() && Auth::user()->isAdmin == 'normal')
        <div class="card">
            <div class="col text-center">
                <a href="{{ route('home') }}" class="btn btn-primary">Dashboard</a>
                <a href="{{ route('object.create') }}" class="btn btn-danger">Create object</a>
            </div>
            <div class="card-header">
                <h1 class="text-center"> User objects</h1>
            </div>
            @foreach($userObject as $obj)
            <div class="card-body">
                <table class="table table-striped table-hover table-dark table-responsive-lg ">
                    <thead>
                        <tr>
                            <th>Object name</th>
                            <th>Attribute name</th>
                            <th>Employee name</th>
                            <th>Employee phone</th>
                            <th>Expired at</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>{{ $obj->name }}</td>
                        <td>{{ $obj->attribute_name }}</td>
                        <td>{{ $obj->employee_name }}</td>
                        <td>{{ $obj->employee_phone }}</td>
                        <td>{{ $obj->expired_at }}</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        @else
        <div class="col text-center">
            <a href="{{ route('home') }}" class="btn btn-primary">Dashboard</a>
            <a href="{{ route('object.create') }}" class="btn btn-danger">Create object</a>
        </div>
        <p class="alert alert-primary" role="alert">{{ Auth::user()->name }}, you are the admin</p>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }} </p>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h1 class="text-center"> All users objects</h1>
            </div>
            @foreach($adminObjects as $obj)
            <div class="card-body">
                <table class="table table-striped table-hover table-dark table-responsive-lg ">
                    <thead>
                        <tr>
                            <th>Object name</th>
                            <th><a href="{{ route('object.edit', $obj->object_id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil" aria-hidden="true"> Edit object</i></a></th>
                            <th>Attribute name</th>
                            <th>Employee name</th>
                            <th>Employee phone</th>
                            <th>Expired at</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>{{ $obj->name }}</td>
                        <td></td>
                        <td>{{ $obj->attribute_name }}</td>
                        <td>{{ $obj->employee_name }}</td>
                        <td>{{ $obj->employee_phone }}</td>
                        <td>{{ $obj->expired_at }}</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection