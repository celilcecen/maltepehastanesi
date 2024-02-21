<?php

namespace App\Mail;

use App\Models\ContactOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactOrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $object;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactOrder $object)
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
        return $this->view('mails.ContactOrder')->subject('Yeni İletişim Formu')->replyTo([$this->object->email]);
    }
}
