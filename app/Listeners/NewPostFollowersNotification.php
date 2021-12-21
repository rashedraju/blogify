<?php

namespace App\Listeners;

use App\Events\NewPostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewPostFollowersNotification
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
     * @param  NewPostCreated  $event
     * @return void
     */
    public function handle(NewPostCreated $event)
    {
        //
    }
}
