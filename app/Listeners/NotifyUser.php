<?php

namespace App\Listeners;

use App\Events\AddressCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Mail\UserMail;

class NotifyUser
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
     * @param  \App\Events\AddressCreated  $event
     * @return void
     */
    public function handle(AddressCreated $event)
    {
        $users = User::get();
        foreach($users as $key => $user)
        {
            \Mail::to($user->email)->send(new UserMail($event->address));
        }
    }
}
