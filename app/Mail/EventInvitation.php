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
    public $guest_key;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $guest_key)
    {
        $this->event = $event;
        $this->guest_key = $guest_key;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com')
                    ->view('mails.eventinvitation')
                    ->with([
                        'guest_key' => $this->guest_key,
                    ]);
    }
}
