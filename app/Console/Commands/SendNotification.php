<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Notifications\ExpiredDateNotification;
use DB;
use Notification;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification on email when an attribute is set to expire';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        $attributes = [];
        
        foreach ($users as $user) {
            $attributes[] = User::join('object_models', 'object_models.user_id', '=', 'users.id')->
        join('attributes', 'attributes.object_id', '=', 'object_models.id')->
        where('attributes.expired_at', '<', Carbon::now()->addDays(7))->
        where('users.id', '=', $user->id)->
        get();
        }
      
        foreach ($users as $user) {
            foreach ($attributes as $attribute) {
                foreach ($attribute as $att) {
                    if ($user->id === $att->user_id) {
                        $user->notify(new ExpiredDateNotification($att));
                    }
                }
            }
        }
    }
}