<?php

namespace App\Mail;

use App\Models\Award;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AwardWinnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $draw;

    public function __construct(Award $draw)
    {
        $this->draw = $draw;
    }

    public function build()
    {
        return $this->subject('Você ganhou um prêmio!')->view('emails.awardWinnerNotification');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Award Winner Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
