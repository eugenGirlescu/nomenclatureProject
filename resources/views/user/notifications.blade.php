@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notification</div>
                <div class="card-body">
                    @if(auth()->user()->unreadNotifications->count() < 1) <p>You don't have a new notification!</p>

                        @else

                        @foreach($notifications as $notification)
                        <p>You have a new notification, your {{ $notification->name }} is set to expire at
                            {{ $notification->expired_at }}!</p>
                        @endforeach

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection