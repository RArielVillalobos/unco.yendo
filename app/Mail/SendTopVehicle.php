<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTopVehicle extends Mailable
{
    use Queueable, SerializesModels;
    public $traveler;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($traveler)
    {
        //
        $this->traveler=$traveler;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.topVehicle');
    }
}
