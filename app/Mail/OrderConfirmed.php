<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Order;

class OrderConfirmed extends Mailable
{
    use Queueable, SerializesModels;
    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order= $order;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          return $this->view('layout.pages.cart.message.confirm-order')->with([
            "order"=>$this->order
        ])->subject("Hatirpal Admin Has Confirmed Your Order");
       
    }
}
