<?php

namespace App\Listeners;

use App\Events\ImageChanged;
use App\Services\ImageHandlerService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ImageSubscriber
{
    public function handleImageChanged(ImageChanged $event) {
        foreach ($event->images as $field => $image) {
            if ($event->model->{$field} != $image) {
                ImageHandlerService::deleteImage([$image]);
            }
        }
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ImageChanged',
            'App\Listeners\ImageSubscriber@handleImageChanged'
        );
    }
}
