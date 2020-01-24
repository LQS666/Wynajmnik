<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OfferNotificationSubscriber implements ShouldQueue
{
    public $delay = 10;

    public function sendNotification($event)
    {
        $event->user->notify(new $event->template($event->data));
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\NewOfferNotification',
            'App\Listeners\OfferNotificationSubscriber@sendNotification'
        );

        $events->listen(
            'App\Events\AcceptedOfferNotification',
            'App\Listeners\OfferNotificationSubscriber@sendNotification'
        );

        $events->listen(
            'App\Events\RejectedOfferNotification',
            'App\Listeners\OfferNotificationSubscriber@sendNotification'
        );

        $events->listen(
            'App\Events\ContactOfferNotification',
            'App\Listeners\OfferNotificationSubscriber@sendNotification'
        );
    }
}
