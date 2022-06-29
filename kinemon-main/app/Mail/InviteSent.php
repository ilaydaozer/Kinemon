<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteSent extends Mailable
{
    use Queueable, SerializesModels;

    public $invitee;
    public $invite;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invitee, $invite)
    {
        $this->invitee = $invitee;
        $this->invite = $invite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails/email')
            ->subject($this->invite->event->createdBy->name . ' invited you!')
            ->with([
                'actionText' => 'View Event',
                'actionUrl' => url('event/detail/' . $this->invite->event_id),
                'content' => "You have been invited by {$this->invite->event->createdBy->name} to attend {$this->invite->event->name}",
            ]);
    }
}
