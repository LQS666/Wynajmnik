<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOfferNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private const TEMPLATE = 'App\Notifications\NewOffer';

    private $user;
    private $offer;
    private $product;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->offer = $model;
        $this->user = $model->product->owner;
        $this->product = $model->product;
    }

    /***
     * @param string $name
     * @return array|string|null
     */
    public function __get(string $name)
    {
        switch ($name) {
            case 'template':
                return self::TEMPLATE;
            case 'data':
                return [
                    'offer' => $this->offer,
                    'user'  => $this->user,
                    'product' => $this->product
                ];
            case 'user':
                return $this->user;
        }
        return null;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
