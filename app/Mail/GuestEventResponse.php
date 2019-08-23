<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GuestEventResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $guest_email;
    public $event;
    public $response;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($guest_email, $event, $response)
    {
        $this->guest_email = $guest_email;
        $this->event = $event;
        $this->response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com')
                    ->view('mails.guesteventresponse')
                    ->with([
                        'guest_email' => $this->guest_email,
                        'event' => $this->event,
                        'response' => $this->response,
                    ]);
    }
}
