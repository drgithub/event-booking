<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $guest_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $guest_id)
    {
        $this->event = $event;
        $this->guest_id = $guest_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('repuestobrian@gmail.com')
                    ->view('mails.eventinvitation')
                    ->with([
                        'guest_id' => $this->guest_id,
                    ]);
    }
}
