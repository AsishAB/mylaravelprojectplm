<?php

namespace App\Listeners;

use App\Events\NewNotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewNotificationEvent $event)
    {
       echo "You have a new message";
    }
}
