@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="text-center">Add an attribute</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('attribute.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="attribute_name">Attribute name</label>
                <input type="text" class="form-control" id="attribute_name" name="attribute_name">
            </div>
            <div class="form-group">
                <label for="employee_name">Employee name</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name">
            </div>
            <div class="form-group">
                <label for="employee_phone">Employee phone</label>
                <input type="text" class="form-control" id="employee_phone" name="employee_phone">
            </div>
            <div class="form-group">
                <label for="active">Is active</label>
                <select name="active" id="active">
                    <option value="no">NO</option>
                    <option value="yes">YES</option>
                </select>
            </div>
            <div class="form-group">
                <label for="expired-at">Expired at:</label>
                <input type="datetime-local" id="expired_at" name="expired_at">
            </div>
            <div class="form-group">
                <label for="channel">Objects</label>
                <select name="channel" id="channel" class="form-control">
                    @foreach($objects as $object)
                    <option value="{{ $object->id }}"> {{ $object->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>

@endsection