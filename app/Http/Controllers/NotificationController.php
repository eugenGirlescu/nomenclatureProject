<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notifications;
use App\Models\Attribute;
use Notification;
use App\Notifications\ExpiredDateNotification;
use Carbon\Carbon;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function notifications()
    {
        $user = auth()->user();
        $notification = Notifications::where('notifiable_id', $user->id)->
        where('read_at', '=', null)->
        get();
      
        $notify = [];
        foreach ($notification as $not) {
            $notify[] = json_decode($not->data);
        }

        auth()->user()->unreadNotifications->markAsRead();

        return view('user.notifications', ['notifications' => $notify]);
    }
}