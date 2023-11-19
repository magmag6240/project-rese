<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $contents;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contents)
    {
        $this->contents = $contents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.information')->with(['contents' => $this->contents])->subject('Rese-information');
    }
}
