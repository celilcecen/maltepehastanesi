<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $object;
    public $related ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $object , $related)
    {
        $this->object = $object;
        $this->related = $related ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.Appointment')->subject('Yeni Checkup Randevu Formu')->replyTo([$this->object->email]);
    }
}
