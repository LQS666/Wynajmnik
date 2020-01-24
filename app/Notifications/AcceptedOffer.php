<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptedOffer extends Notification
{
    use Queueable;

    private $user;
    private $offer;
    private $product;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->user = $data['user'];
        $this->offer = $data['offer'];
        $this->product = $data['product'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(trans('notification.AcceptedOfferSubject'))
            ->greeting(trans('notification.helloWithName', [
                'name' => $this->user->name
            ]))
            ->line(trans('notification.AcceptedOfferContent', [
                'product' => $this->product->name,
                'product_url' => route('web.offer', ['product' => $this->product->slug])
            ]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
