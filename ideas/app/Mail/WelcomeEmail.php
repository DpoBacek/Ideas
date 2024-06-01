<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Welcome to '.config('app.name', ''),
        );
    }


    public function content()
    {
        return new Content(
            view: 'emails.welcome_email.blade.php',
            with: [
                'user' =>$this->user
            ]
        );
    }

    public function attachments()
    {
        return [];
    }
}
