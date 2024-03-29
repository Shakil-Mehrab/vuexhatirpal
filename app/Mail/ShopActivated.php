<?php

namespace App\Mail;

use App\Model\Shop;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopActivated extends Mailable
{
    use Queueable, SerializesModels;


    public $shop;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('public.pages.cart.mail.customer.shop-activated');
    }
}
