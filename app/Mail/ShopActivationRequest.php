<?php

namespace App\Mail;

use App\Model\Shop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopActivationRequest extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Shop
     */
    public $shop;

    /**
     * Create a new message instance.
     *
     * @param Shop $shop
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
        return $this->markdown('public.pages.cart.mail.admin.shop-activation');
    }
}
