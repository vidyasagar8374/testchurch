<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendRecipt extends Mailable
{
    use Queueable, SerializesModels;
    public $masslistdata;
    /**
     * Create a new message instance.
     */
    public function __construct($masslistdata)
    {
        //
        $this->masslistdata = $masslistdata;
        // dd($masslistdata);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Recipt',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Welcome Email')
            ->view('mails.sendreceipt', ['masslistdata' => $this->masslistdata]);
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
