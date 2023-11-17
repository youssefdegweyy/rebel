<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderDeliveryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $order;

    public function __construct($name, $order)
    {
        $this->name = $name;
        $this->order = $order;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Rebel - Order Delivered',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mails.order_delivery',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
