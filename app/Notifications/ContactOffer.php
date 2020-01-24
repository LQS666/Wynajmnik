<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactOffer extends Notification
{
    use Queueable;

    private $user;
    private $offer;
    private $product;
    private $address;
    private $owner;

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
        $this->owner = $data['owner'];
        $this->address = $data['product']['address'];
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
        $name = $this->owner['name'] . ' ' . $this->owner['surname'];
        $email = $this->owner['email_contact'] ? $this->owner['email_contact'] : $this->owner['email'];
        $phone = $this->address['phone'];
        $address = $this->address['zip_code'] . ' ' . $this->address['city'];
        $street = $this->address['street'] . ' ' . $this->address['home_number'] . ($this->address['apartment_number'] ? '/' . $this->address['apartment_number'] : '');
        $navigation = ($this->address['latitude'] && $this->address['longitude']) ? $this->address['latitude'] . '/' . $this->address['longitude'] : '';

        return (new MailMessage)
            ->subject(trans('notification.ContactOfferSubject'))
            ->greeting(trans('notification.helloWithName', [
                'name' => $this->user->name
            ]))
            ->line(trans('notification.ContactOfferContent', [
                'product' => $this->product->name,
                'product_url' => route('web.offer', ['product' => $this->product->slug]),
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'street' => $street,
                'navigation' => $navigation,
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
