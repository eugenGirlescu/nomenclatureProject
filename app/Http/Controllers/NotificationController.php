<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attribute;
use Notification;
use App\Notifications\ExpiredDateNotification;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        $notification = auth()->user()->notifications->first()->data;
        auth()->user()->unreadNotifications->markAsRead();

        return view('user.notifications', ['notification' => $notification]);
    }
}