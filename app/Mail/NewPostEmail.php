<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPostEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $submit_properties;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($submit_properties)
    {
        $this->submit_properties=$submit_properties;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->view('admin.includes.message.NewPostEmail')->with([
            "product"=>$this->submit_properties
        ])->subject("New Product Has been Created");
    }
}
