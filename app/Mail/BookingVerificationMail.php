<?php

namespace App\Mail;

use App\Models\frontend\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Your Room Booking - Hostily',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking_verification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
