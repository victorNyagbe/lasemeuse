<?php

namespace App\Listeners;

use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;
use App\Events\NewsletterMessageEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterMessageListener
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
    public function handle(NewsletterMessageEvent $event): void
    {
        $data = $event->data;

        Mail::to($data["email"])->send(new NewsletterMail($data));
    }
}
