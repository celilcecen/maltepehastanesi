<?php

namespace App\Mail;

use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoryMail extends Mailable
{
    use Queueable, SerializesModels;
    public $object;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Story $object)
    {
        $this->object = $object;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.Story')->subject('Yeni Hikaye Formu');
    }
}
