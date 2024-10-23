<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Mail\Auth\UserCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreatedEvent $event): void
    {
        $data = $event->data;

        Mail::to($data["email"])->send(new UserCreatedMail($data));
    }
}
