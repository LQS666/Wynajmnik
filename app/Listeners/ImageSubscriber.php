<?php

namespace App\Listeners;

use App\Events\ImageHandleOnDelete;
use App\Events\ImageHandleOnUpdate;
use App\Services\ImageHandlerService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ImageSubscriber
{
    public function handleImageOnUpdate(ImageHandleOnUpdate $event) {
        $to_delete = [];

        if (!empty($event->model->images) && is_array($event->model->images)) {
            $changes = $event->model->getChanges();
            if ($changes) {
                foreach ($event->model->images as $image) {
                    if (isset($changes[$image])) {
                        $to_delete[] = $event->model->getOriginal($image);
                    }
                }
            }
        }

        ImageHandlerService::deleteImages($to_delete);
    }

    public function handleImageOnDelete(ImageHandleOnDelete $event) {
        $to_delete = [];

        if (method_exists($event->model, 'images')) {
            if (!empty($event->model->images)) {
                foreach ($event->model->images as $image) {
                    $to_delete[] = $image->file;
                }
            }
        }

        if (!empty($event->model->file)) {
            $to_delete[] = $event->model->file;
        }

        ImageHandlerService::deleteImages($to_delete);
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ImageHandleOnUpdate',
            'App\Listeners\ImageSubscriber@handleImageOnUpdate'
        );

        $events->listen(
            'App\Events\ImageHandleOnDelete',
            'App\Listeners\ImageSubscriber@handleImageOnDelete'
        );
    }
}
