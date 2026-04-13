<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WeeklyFilmsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $films;
    public $series;
    public $user;


    /**
     * Create a new message instance.
     */
    public function __construct($films, $series, $user)
    {
        $this->films = $films;
        $this->series = $series;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('🎬 Novos filmes e séries da semana')
            ->view('emails.weekly-films');
    }
}
